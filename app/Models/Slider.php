<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $fillable = [ 
        'image',
        'title',
        'sub_title',
        'description',
    ];
}
