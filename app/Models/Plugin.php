<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    public $fillable = [ 
        'paystack_key',
        'paystack_secret',
    ];
}
