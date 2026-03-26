<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// MenuItem.php
class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'MenuItem';

    protected $fillable = [
        'name',
        'description',
        'prix',
        'temp_prepa',
        'image',
        'status',
        'user_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
