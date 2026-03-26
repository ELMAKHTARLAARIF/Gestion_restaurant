<?php

use App\Models\User;

class ReservationService {

    public static function Reservation($data){
        $customer = User::find()->where('phone',$data->telephone);
        dd($customer);
    }
}