<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Services\ReservationService;
use App\Models\MenuItem;
use App\Models\Order;
use App\Events\ReservationCreated;
use App\Models\Reservation;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
            return redirect()->route('reservation')->with('error', $result['message']);
        }

        // Fire event
        event(new ReservationCreated($result['reservation']));

        return redirect()->back()->with('success', 'Reservation created');
        // $reservation = $result['reservation'];

        // $cart = json_decode($request->pre_order, true);

        // if ($cart) {
        //     foreach ($cart as $item) {
        //         $totalPrice = $item['quantity'] * $item['price'];

        //         $reservation->Orders()->create([
        //             'item_id'     => $item['id'],
        //             'quantity'    => $item['quantity'],
        //             'total_price' => $totalPrice,
        //             'order_date'  => now(),
        //             'status'      => 'pending',
        //             'user_id'     => Auth::id(),
        //         ]);
        //     }
        // }

    }

    public function accept($id)
    {
        $Accept = Reservation::find($id);
        $Accept->status = 'accepted';
        $Accept->save();

        if (!$Accept) {
            return redirect()->route('admin.reservations')->with('error', 'Failed to accept reservation');
        }

        return redirect()->route('admin.reservations')->with('success', 'Reservation accepted');
    }
    public function cancel($id)
    {
        $cancel = Reservation::find($id);
        $cancel->status = 'cancelled';
        $cancel->save();

        if (!$cancel) {
            return redirect()->route('admin.reservations')->with('error', 'Failed to cancel reservation');
        }

        return redirect()->route('admin.reservations')->with('success', 'Reservation canceled');
    }
    public function delete($id)
    {
        $delete = Reservation::find($id);
        $delete->delete();
        if (!$delete) {
            return redirect()->route('admin.reservations')->with('error', 'Failed to delete reservation');
        }
        return redirect()->route('admin.reservations')->with('success', 'Reservation deleted');
    }
}
