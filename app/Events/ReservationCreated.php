<?php
namespace App\Events;

use App\Models\Reservation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReservationCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = [
            'id' => $reservation->id,
            'tableNumber' => $reservation->tableNumber,
            'numberOfPeaple' => $reservation->numberOfPeaple,
            'customer_name' => $reservation->customer->name, // assuming reservation has relation customer()
            'status' => $reservation->status,
            'created_at' => $reservation->created_at->toDateTimeString(),
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('admin-notifications');
    }
}
