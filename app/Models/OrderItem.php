<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'price',
        'product_by_shopid',
        'quantity',
        'payment_status',
        'shop_for',
        'status',
        'notification',
    ];

    protected function order()
    {
        return $this->belongsTo(Order::class);
    }
}
