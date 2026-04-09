<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'quantity',
        'Total_Price',
        'status',
        'order_date',
        'user_id',
        'stripe_payment_intent'
    ];

    protected $table = 'Order';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function items()
    {
        return $this->hasMany(order_menu_item::class);
    }

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'order_menu_item', 'order_id', 'menu_item_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
