<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Traits\ProductHelper;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;




class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.product.create', [
            'badges' => ProductHelper::$badges,
            'featured' => ProductHelper::$featured,
            'categories' => $categories,
        ]);
    }


    public function store(StoreRequest $request){

        dd($request->all());

        $new_product = Product::firstOrCreate([
            'title' => $request->title,
            'price' => $request->price,
            'slug'=>Str::slug($request->title),
            'availability'=>$request->availability,
            'featured'=>$request->featured,
            'badge'=>$request->badge,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
        ]);
        
        if($request->has('images')){
            foreach($request->file('images')as $image){
                $path = time() . '.' . $image->getClientOriginalExtension();
                $manager = new ImageManager( new Driver());
                $image = $manager->read($path);
                $image->resize(600, 600);
                $image->save(public_path('upload/product/').$path);
                ProductImage::create([
                    'product_id'=>$new_product->id,
                    'image_path'=>$path
                ]);
            }
        }
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
        
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(UpdateRequest $request, $id){
       

        $product  = Product::findOrFail($id);
        $product->update([
            'title' => $request->title,
            'price' => $request->price,
            'availability'=>$request->availability,
            'featured'=>$request->featured,
            'badge'=>$request->badge,
            'slug'=>Str::slug($request->title),
            'price'=>$request->price,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'image'=>$image_file ?? $product->image,
        ]);

        if($request->has('images')){
            foreach($request->file('images')as $image){
                $path = time() . '.' . $image->getClientOriginalExtension();
                $manager = new ImageManager( new Driver());
                $image = $manager->read($path);
                $image->resize(600, 600);
                $image->save(public_path('upload/product/images/').$path);
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image_path'=>$path
                ]);
            }
        }
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully');
    }
}
