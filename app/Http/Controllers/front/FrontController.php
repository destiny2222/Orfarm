<?php

namespace App\Http\Controllers\front;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Mail\MailContact;
use App\Models\ProductImage;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->get();
        $featured_product = Product::where('featured', 'Top Offers')->get();
        return view('frontend.index',[
            'categories' => $categories,
            'products' => $featured_product,
           
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
        $product = Product::orderBy('id', 'DESC')->paginate(12);
        return view('frontend.shop',[
            'products' => $product,
        ]);
    }

    public function shop_details(Product $product){
        $image = ProductImage::where('product_id', $product->id)->get();
        $reviews = ReviewRating::where('product_id', $product->id)->get();
        // related products with the same category
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        // recent products
        $recent_products = Product::orderBy('id', 'DESC')->latest()->take(3)->get();
        return view('frontend.shop_details', [
            'product' => $product,
            'images'=>$image,
            'reviews' => $reviews,
            'related_products' => $related_products,
            'recent_products' => $recent_products,
        ]);
    }

    public function contactform(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        try {
            $contact = Contact::create($request->all());
            // dd($contact);
            if ($contact) {
                Mail::to('destinyerieme47@mail.com')->send(new MailContact($contact));
                return back()->with('success', 'Your Message Have Been Sent Successful');
            }
            return back()->with('error', 'Oops something went wrong');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Oops something went wrong');
        }
    }

    function searchProducts(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);

        try {
            $query = $request->input('query');
            $product = Product::where('name', 'like', "%$query%")->orWhere('body', 'like', "%$query%")->get();
            return View('frontend.search', compact('product', 'query'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', 'Oops invalid feed');
        }
    }




    public function ItemDetails($category)
    {

        $category = Category::where('slug', $category)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(10);
        return view('frontend.product', [
            'products' => $products,
        ]);
    }

    
}
