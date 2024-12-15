<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
}
