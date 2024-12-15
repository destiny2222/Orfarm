<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [ 
        'title',
        'slug',
        'availability',
        'featured',
        'badge',
        'price',
        'discount',
        'images',
        'status',
        'category_id',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugAttribute(): string
    {
        return Str::slug($this->title);
    }
    public function getDiscountPriceAttribute(): float
    {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public  function photos(){
        return $this->hasMany(ProductImage::class);
    }

   

    public function getImagesArrayAttribute(): array
    {
        return $this->images ? explode(',', $this->images) : [];
    }
    
    

    // protected static function booted()
    // {
    //     static::creating(function ($product) {
    //         do {
    //             $sku = 'SKU-' . strtoupper(Str::random(8));
    //         } while (Product::where('sku', $sku)->exists());
        
    //         $product->sku = $sku;
    //     });        
    // }

    protected $casts = [
        // 'images' => 'array',
    ];
}