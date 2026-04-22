<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Tymon\JWTAuth\Http\Parser\AuthHeaders;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreatedMail;
use App\Mail\OrderDeletedMail;

class OrderController extends Controller
{
    public function Show()
    {
        $AllOrders = Order::with(['customer', 'items.menuItem'])->get();
        $counts = [
            'pending' => $AllOrders->where('status', 'pending')->count(),
            'confirmed' => $AllOrders->where('status', 'confirmed')->count(),
            'preparing' => $AllOrders->where('status', 'preparing')->count(),
            'ready' => $AllOrders->where('status', 'ready')->count(),
            'delivered' => $AllOrders->where('status', 'delivered')->count(),
            'completed' => $AllOrders->where('status', 'completed')->count(),
            'cancelled' => $AllOrders->where('status', 'cancelled')->count(),
        ];
        return view('Admin.Orders', compact('AllOrders', 'counts'));
    }
    public function createPaymentIntent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'items'  => 'required|array|min:1',
            'email'  => 'required|email',
            'prenom' => 'required|string',
            'nom'    => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $totalAmount = collect($request->items)->sum(fn($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 0));
        $amountCents = (int) round($totalAmount * 100);

        if ($amountCents < 100) {
            return response()->json(['success' => false, 'message' => 'Montant minimum non atteint.'], 422);
        }

        try {
            Stripe::setApiKey(config('stripe.secret'));

            $intent = PaymentIntent::create([
                'amount' => $amountCents,
                'currency' => 'mad',
                'automatic_payment_methods' => ['enabled' => true],
            ]);

            return response()->json(['success' => true, 'clientSecret' => $intent->client_secret]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function store(CreateOrderRequest $request)
    {
        $validator = $request->validated();

        $totalPrice = collect($request->items)->sum(fn($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 0));
        $quantity   = collect($request->items)->sum(fn($i) => $i['qty']);

        $status = 'pending';

        if ($request->payment_method === 'card' && isset($request->stripe_payment_intent)) {
            try {
                Stripe::setApiKey(config('stripe.secret'));
                $intent = PaymentIntent::retrieve($request->stripe_payment_intent);

                if ($intent->status !== 'succeeded') {
                    return response()->json(['success' => false, 'message' => 'Paiement non confirmé.'], 402);
                }

                if (abs($intent->amount - ($totalPrice * 100)) > 1) {
                    return response()->json(['success' => false, 'message' => 'Montant invalide.'], 422);
                }

                $status = 'confirmed';
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
        }

        $order = Order::create([
            'reservation_id'        => $request->reservation_id ?? null,
            'user_id'               => Auth::id(),
            'quantity'              => $quantity,
            'Total_Price'           => $totalPrice,
            'stripe_payment_intent' => $request->stripe_payment_intent ?? null,
            'order_date'            => now(),
            'status'                => $status,
            'N°_commande' => 'CMD-' . now()->format('YmdHis') . '-' . Auth::id(),
        ]);
        foreach ($request->items as $i) {
            $order->items()->create([
                'menu_item_id' => $i['id'],
                'quantity'     => $i['qty'],
            ]);
        }

        $orderRef = '#LM-' . date('Y') . '-' . str_pad($order->id, 4, '0', STR_PAD_LEFT);
        Mail::to(Auth::user()->email)->send(new OrderCreatedMail($order));
        return response()->json([
            'success'   => true,
            'order_id'  => $order->id,
            'order_ref' => $orderRef,
        ]);
    }
    public function Update_Status($id, Request $request)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,confirmed,preparing,ready,cancelled,completed,delivered'
        ]);

        $order->status = $request->status;
        $order->save();

        return response()->json([
            'success' => true,
            'status' => $order->status
        ]);
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
    public function ShowPanier()
    {
        $customer = Auth::user(); // or however your auth->customer relation works

        $orders = Order::with(['items.menuItem'])
            ->where('user_id', $customer->id)
            ->latest()
            ->get();

        $activeOrder = $orders->whereIn('status', ['pending', 'confirmed', 'preparing', 'in_progress'])->first();
        $pastOrders  = $orders->whereIn('status', ['completed', 'delivered', 'cancelled']);

        return view('CLient.Panier', compact('activeOrder', 'pastOrders'));
    }
    public function delete($id)
    {
        $order = Order::with('customer')->findOrFail($id);

        // send email to client
        if ($order->customer && $order->customer->email) {
            Mail::to($order->customer->email)->send(
                new OrderDeletedMail($order)
            );
        }

        // delete order
        $order->delete();

        return back()->with('success', 'Order deleted and email sent');
    }
}
