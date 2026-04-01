<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    protected $fillable = ['name', 'lastName', 'telephone', 'reservationDate', 'Hour', 'numberOfPeaple', 'tableNumber', 'customer_id', 'order_id', 'status'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
