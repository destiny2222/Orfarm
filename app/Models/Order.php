<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [ 
        'user_id', 
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_country',
        'shipping_state',
        'shipping_city',
        'shipping_address',
        'shipping_postal_code',
        'payment_method',
        'payment_status',
        'total_amount',
        'order_status',
        'transaction_reference',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
