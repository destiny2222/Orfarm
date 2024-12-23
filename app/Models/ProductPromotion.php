<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
    public $fillable = [ 
        'title','subtitle','description','status','image'
    ];
}
