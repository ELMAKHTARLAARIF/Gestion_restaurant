<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ReservationService;

class ReservationController extends Controller
{
    public function MakeReservation(Request $request){
        $validateData = $request->validate([
        'item_id'     =>'required|int',
        'name'        => 'required|string|max:255',
        'lastNmae'    => 'required|string|max:255',
        'telephone'       => 'required|string|max:255',
        'reservationDate'=> 'required|date',
        'Hour' => 'required|time',
        'numberOfPeaple' => 'required|int|max:6|min:1',
        ]);
        return ReservationService::Reservation($validateData);
    }
}
