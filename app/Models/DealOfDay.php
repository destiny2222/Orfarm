<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealOfDay extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'offer_end_time',
        'image',
        'is_active',
        'cta_text', 
    ];


    protected $casts = [
      'offer_end_time'=>'date',
    ];
    
}
