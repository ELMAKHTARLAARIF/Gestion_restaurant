<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_menu_item extends Model
{
    protected $fillable = ['order_id', 'menu_item_id', 'quantity'];

    protected $table = 'order_menu_item';
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class, 'menu_item_id');
    }
}
