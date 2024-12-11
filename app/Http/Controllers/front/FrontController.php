<?php

namespace App\Http\Controllers\front;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->get();
        $featured_product = Product::where('featured', 'Top Offers')->get();
        return view('frontend.index',[
            'categories' => $categories,
            'products' => $featured_product,
            // 'count'=> p,
        ]);
    }
    public function about(){
        return view('front.about');
    }

    public function contact(){
        return view('front.contact');
    }

    public function services(){
        return view('front.services');
    }

    public function blog(){
        return view('front.blog');
    }

    public function blog_details(){
        return view('front.blog_details');
    }

    public function shop(){
        $product = Product::orderBy('id', 'DESC')->get();
        return view('frontend.shop',[
            'products' => $product,
        ]);
    }

    public function shop_details(Product $product){
        $image = ProductImage::where('product_id', $product->id)->get();
        return view('frontend.shop_details', [
            'product' => $product,
            'images'=>$image,
        ]);
    }

    
}
