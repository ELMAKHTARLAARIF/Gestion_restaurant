<?php

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rules\Date as RulesDate;
use Symfony\Component\VarDumper\Cloner\Data;

class ReservationService
{

    public static function Reservation($data)
    {
        $customer = User::where('phone', $data->telephone);
        $isAviable = Reservation::where('tableNumber',$data->tableNumber)->where('reservationDate',$data->reservationDate)->where('Hour',$data->Hour);
        if($isAviable){
            return 'error: this table is not Aviable in this time please chose another time';
        }
        if ($customer && !$isAviable) {
            if ($data->date < new Date) {
                try {
                    Reservation::created($data);
                    return 'success: Reservation Success';
                } catch (\Throwable $th) {
                    return 'error: Reservation Failed Try Again';
                }
            }
        }
    }
}
