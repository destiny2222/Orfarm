<?php

namespace App\Http\Controllers\front;

use App\Models\Faq;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Mail\MailContact;
use App\Models\DealOfDay;
use App\Models\ProductImage;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use App\Models\ProductPromotion;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->get();
        $featured_product = Product::where('featured', 'Top Offers')->get();
        $slide = Slider::orderBy('id', 'DESC')->get();
        $twoColumnBanner = ProductPromotion::orderBy('id', 'DESC')->first();
        $banner = Banner::orderBy('id', 'DESC')->take(3)->get();
        $deal = DealOfDay::orderBy('id', 'desc')->first();

        $Product = Product::orderBy('id', 'DESC')->paginate(12);
        
        $allProducts = Product::all();
        $meatCategory = Category::where('title', 'Fresh Meat')->first();
        $vegetableCategory = Category::where('title', 'Vegetables')->first();
        $snackCategory = Category::where('title', 'Fresh Fruits')->first();

        $post = Post::orderBy('id', 'DESC')->get();

        $meatProducts = $meatCategory ? $meatCategory->products : collect();
        $vegetableProducts = $vegetableCategory ? $vegetableCategory->products : collect();
        $snackProducts = $snackCategory ? $snackCategory->products : collect();
        // dd($snackProducts);
        return view('frontend.index',[
            'categories' => $categories,
            'products' => $featured_product,
            'slides'=>$slide,
            'twoColumnBanner'=>$twoColumnBanner,
            'banners'=>$banner,
            'deal'=>$deal,
            'allProducts'=>$allProducts,
            'meatProducts'=>$meatProducts,
            'vegetableProducts'=>$vegetableProducts,
            'snackProducts'=>$snackProducts,
            'pro'=>$Product,
            'posts'=>$post,
        ]);
    }
    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function faq(){
        $faq = Faq::orderBy('id','desc')->get();
        return view('frontend.faq',[
            'faqs'=>$faq
        ]);
    }

    public function blog(){
        $post = Post::orderBy('id', 'desc')->paginate(9);
        return view('frontend.blog',[
            'posts'=>$post
        ]);
    }

    public function blog_details(Post $post){
        return view('frontend.blog_details',[
            'post' => $post,
        ]);
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
                Mail::to('destinyerieme47@gmail.com')->send(new MailContact($contact));
                return back()->with('success', 'Your Message Have Been Sent Successful');
            }
            return back()->with('error', 'Oops something went wrong');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Oops something went wrong');
        }
    }




    public function searchEngine(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('title', '!=', Null)
            ->where(function ($query) use ($search) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('category', function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%");
                });
            })
            ->paginate(6);
            if (!$search) {
                return redirect()->route('frontend.index')->with('error', 'Your request was not found.');
            }
        return view('frontend.search', compact('products'));
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
