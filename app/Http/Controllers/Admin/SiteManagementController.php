<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Http\Requests\Admin\DealRequest;
use App\Http\Requests\Admin\PluginRequest;
use App\Http\Requests\Admin\ProductPromotionRequest;
use App\Http\Requests\Admin\ShippingRequest;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Banner;
use App\Models\DealOfDay;
use App\Models\Plugin;
use App\Models\ProductPromotion;
use App\Models\Shipping;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SiteManagementController extends Controller
{

    public function index(){
        $banner = Banner::orderBy('id','desc')->get();
        // dd($banner);
        $dealOfDay = DealOfDay::orderBy('id','desc')->first();
        $promotion = ProductPromotion::orderBy('id','desc')->first();
        $plugin = Plugin::orderBy('id','desc')->first();
        return view('admin.homepage.index',[
            'banners'=>$banner,
            'dealOfDays'=>$dealOfDay,
            'promotion'=>$promotion,
            'plugins'=>$plugin
        ]);
    }



    public function bannerStore(BannerRequest $request){
        // dd($request->all());
        try {
             // resize image with intervention image version 3
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(457, 220);
                $processedImage->save(public_path('upload/banner/') . $imageName);
            }


            Banner::firstOrCreate([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'description'=>$request->description,
                'image'=>$imageName,
            ]);
            return back()->with('success', 'Updated Successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }

    public function bannerEdit($id){
        $banner = Banner::find($id);
        return view('admin.homepage.banner.edit', compact('banner'));
    }

    public function bannerUpdate(Request $request, $id){
        try{
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(457, 220);
                $processedImage->save(public_path('upload/banner/') . $imageName);
            }
            $banner = Banner::find($id);
            $banner->update([
                 'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'description'=>$request->description,
                'image'=>$imageName ?? $request->image,
            ]);
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error has occurred please try again');
        }
    }

    public function bannerDelete($id){
        try{
            Banner::destroy($id);
            return back()->with('success', 'Deleted Successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }


    public function dealStore(DealRequest $request){
        // resize image with intervention image version 3
        try{
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = request()->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(300, 300);
                $processedImage->save(public_path('upload/deal/') . $imageName);
            }

            if (DealOfDay::count()) {
                DealOfDay::first()->update([
                    'title'=>$request->title,
                    'subtitle'=>$request->sub_title,
                    'description'=>$request->description,
                    'offer_end_time'=>$request->offer_end_time,
                    'is_active'=>$request->is_active,
                    'image'=>$request->image,
                ]);
            } else {
                DealOfDay::create([
                    'title'=>$request->title,
                    'subtitle'=>$request->sub_title,
                    'description'=>$request->description,
                    'offer_end_time'=>$request->offer_end_time,
                    'is_active'=>$request->is_active,
                    'image'=>$request->image,
                ]);
            }
            return back()->with('success', ' Updated successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }


    public function promotionStore(ProductPromotionRequest $request){
        try{
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = request()->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(300, 300);
                $processedImage->save(public_path('upload/promotion/') . $imageName);
            }

            if (ProductPromotion::count()) {
                ProductPromotion::first()->update([ 
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'description'=>$request->description,
                    'status'=>$request->status,
                    'image'=>$imageName,
                ]);
            } else {
                ProductPromotion::create([
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'description'=>$request->description,
                    'status'=>$request->status,
                    'image'=>$imageName,
                ]);
            }
            return back()->with('success', 'created successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error',  'An error occurred');
        }
    }


    public function  pluginStore(PluginRequest $request){
        try {
            Plugin::firstOrCreate($request->all());
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }


    public function shippingIndex(){
        $shipping = Shipping::orderBy('id', 'desc')->get();
        return view('admin.shipping.index');
    }


    public function shippingEdit($id){
        $shipping = Shipping::find($id);
        return view('admin.shipping.edit', compact('shipping'));
    }


    public function shippingStore(ShippingRequest $request){
        try{
            Shipping::firstOrCreate($request->all());
            return back()->with('success','shipping order added successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }

    public function shippingUpdate(ShippingRequest $request, $id){
        try{
            $shipping = Shipping::find($id);
            $shipping->update($request->all());
            return back()->with('success','shipping order updated successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }


    public function  sliderIndex(){
        $slider = Slider::orderBy('id', 'desc')->get();
        return view('admin.slider.index');
    }

    public function sliderCreate(){
        return view('admin.slider.create');
    }

    public function sliderStore(SliderRequest $request){
        try{
            // resize image with intervention image version 3
            $imageName = null;

            if ($request->hasFile('image')) {
                $image = request()->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(457, 220);
                $processedImage->save(public_path('upload/slider/') . $imageName);
            }

            Slider::create([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'description'=>$request->description,
                'image'=>$imageName,
            ]);
            return back()->with('success', ' Updated successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }

    public function sliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',[
            'slider' => $slider
        ]);
    }

    public function sliderUpdate(Request $request, $id){
        try {

            // resize image with intervention image version 3
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = request()->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(457, 220);
                $processedImage->save(public_path('upload/slider/') . $imageName);
            }


            $slider = Slider::findOrFail($id);
            $slider->update([
                'title'=>$request->input('title'),
                'sub_title'=>$request->input('sub_title'),
                'description'=>$request->input('description'),
                'image'=>$imageName ?? $slider->image,
            ]);
            return back()->with('success', 'Updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }


    public function sliderDelete($id){
        try{
            $slider = Slider::findOrFail($id);
            $slider->delete();
            return back()->with('success', 'slider deleted successfully');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return back()->with('error', 'slider failed to delete');
        }

    }


    
}
