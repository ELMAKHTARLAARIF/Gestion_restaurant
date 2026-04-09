<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
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

    public function store(Request $request)
    {
        // 1. Validate request
        $validator = Validator::make($request->all(), [
            'items'          => 'required|array|min:1',
            'prenom'         => 'required|string',
            'nom'            => 'required|string',
            'email'          => 'required|email',
            'telephone'      => 'required|string',
            'payment_method' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // 2. Calculate totals
        $totalPrice = collect($request->items)->sum(fn($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 0));
        $quantity   = collect($request->items)->sum(fn($i) => $i['qty']);

        $status = 'pending';

        // 3. Stripe payment verification (if card)
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

        // 4. Create order
        $order = Order::create([
            'reservation_id'        => $request->reservation_id ?? null,
            'user_id'               => Auth::id(),
            'quantity'              => $quantity,
            'Total_Price'           => $totalPrice,
            'stripe_payment_intent' => $request->stripe_payment_intent ?? null,
            'order_date'            => now(),
            'status'                => $status,
        ]);

        // 5. Save each item (order_id is automatically set)
        foreach ($request->items as $i) {
            $order->items()->create([
                'menu_item_id' => $i['id'],
                'quantity'     => $i['qty'],
            ]);
        }

        // 6. Return order reference
        $orderRef = '#LM-' . date('Y') . '-' . str_pad($order->id, 4, '0', STR_PAD_LEFT);

        return response()->json([
            'success'   => true,
            'order_id'  => $order->id,
            'order_ref' => $orderRef,
        ]);
    }
}
