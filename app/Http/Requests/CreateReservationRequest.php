<?php
namespace App\Http\Requests;

class CreateReservationRequest {

public static function handle($request){
        $validateData = $request->validate([
        'item_id'     =>'required|int',
        'name'        => 'required|string|max:255',
        'lastNmae'    => 'required|string|max:255',
        'telephone'       => 'required|string|max:255',
        'reservationDate' => 'required|date',
        'Hour' => 'required|time',
        'numberOfPeaple' => 'required|int|max:6|min:1',
        ]);
        return $validateData;
}
}