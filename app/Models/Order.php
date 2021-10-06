<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderId',
        'first_name',
        'last_name',
        'email',
        'phone',
        'total',
        'amount',
        'address',
        'payment_by',
        'divisions',
        'district',
        'user_id',
        'product_id',
        'order_number',
        'transaction_id',
        'currency',
        'status',
        'notification',
        'customernotification',
        'quantity',
        'orderfor',
    ];
    protected function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // protected function product()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
