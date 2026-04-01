<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Services\ReservationService;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function ShowReservationForm()
    {

        $items = MenuItem::all();
        return view('CLient.Reservation', compact('items'));
    }
    public function MakeReservation(CreateReservationRequest $request)
    {
        $result = ReservationService::Store($request->validated());

        if (!$result['success']) {
            return redirect()->back()
                ->with('error', $result['message'])
                ->withInput();
        }

        $reservation = $result['reservation'];

        $cart = json_decode($request->pre_order, true);

        if ($cart) {
            foreach ($cart as $item) {
                $totalPrice = $item['quantity'] * $item['price'];

                $reservation->Orders()->create([
                    'item_id'     => $item['id'],
                    'quantity'    => $item['quantity'],
                    'total_price' => $totalPrice,
                    'order_date'  => now(),
                    'status'      => 'pending',
                    'user_id'     => Auth::id(),
                ]);
            }
        }

        return redirect()->route('home')->with('success', $result['message']);
    }
}
