<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReservationService
{
    /**
     * @param  array $data  — validated data array from CreateReservationRequest
     * @return array        — ['success' => bool, 'message' => string]
     */
    public static function Store(array $data): array
    {
        // 1. Check date is not in the past (belt-and-suspenders beyond form validation)
        $reservationDate = Carbon::parse($data['reservationDate']);
        if ($reservationDate->startOfDay()->lt(Carbon::today())) {
            return ['success' => false, 'message' => 'Reservation date cannot be in the past.'];
        }

        // 2. Check table availability  — fixed: missing ->exists() caused the bug
        //    (a query builder object is always truthy without ->exists())
        $isAvailable = !Reservation::where('tableNumber',     $data['tableNumber'])
            ->where('reservationDate', $data['reservationDate'])
            ->where('Hour',            $data['Hour'])
            ->exists();

        if (!$isAvailable) {
            return ['success' => false, 'message' => 'This table is not available at the selected time. Please choose another time.'];
        }

        // 3. Create the reservation  — fixed: Reservation::created() → Reservation::create()
        $customer = User::where('phone', $data['telephone'])->first();
        if (!$customer) {
            return ['success' => false, 'message' => 'No user found with the provided phone number. Please register first.'];
        }
        $reservation = Reservation::create([
            'customer_id'     => $customer->id,
            'reservationDate' => $data['reservationDate'],
            'Hour'            => $data['Hour'],
            'numberOfPeaple'  => $data['numberOfPeaple'],
            'tableNumber'     => $data['tableNumber'],
            'status'          => 'pending',
        ]);

        return [
            'success' => true,
            'message' => 'Reservation successful!',
            'reservation' => $reservation 
        ];
    }
}
