<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = [
        'reservation_id',
        'item_id',
        'quantity',
        'total_price',
        'status',
        'order_date',
        'user_id',
    ];
protected $table = 'Order';
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'order_menu_item', 'order_id', 'menu_item_id')->withPivot('quantity');
    }
}
