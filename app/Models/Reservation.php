<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    protected $fillable = ['name', 'lastName', 'telephone', 'reservationDate', 'Hour', 'numberOfPeople', 'tableNumber', 'customer_id', 'order_id', 'status', 'special_requests'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
