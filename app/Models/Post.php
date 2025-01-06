<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public $fillable = [ 
        'title','image','description','slug'
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function getSlugAttribute(){
        return Str::slug($this->title);
    }
}
