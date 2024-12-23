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
            return redirect()->route('admin.home.page')->with('success', 'Updated Successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }

    public function bannerCreate(){
        return view('admin.homepage.bannerCreate');
    }

    public function bannerEdit($id){
        $banner = Banner::find($id);
        return view('admin.homepage.bannerEdit', compact('banner'));
    }

    public function bannerUpdate(Request $request, $id){
        try{
            // $imageName = null;
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
                'image'=>$imageName ?? $banner->image,
            ]);
            return redirect()->route('admin.home.page')->with('success', 'Banner updated successfully');
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
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(1920, 700);
                $processedImage->save(public_path('upload/deal/') . $imageName);
            }

            $existingDealOfDay = DealOfDay::first();
            if ($existingDealOfDay) {
                $existingDealOfDay->update([ 
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'description'=>$request->description,
                    'offer_end_time'=>$request->offer_end_time,
                    // 'is_active'=>$request->is_active,
                    'image'=>$imageName ?? $existingDealOfDay->image,
                ]);
            } else {
                DealOfDay::create([
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'description'=>$request->description,
                    'offer_end_time'=>$request->offer_end_time,
                    // 'is_active'=>$request->is_active,
                    'image'=>$imageName,
                ]);
            }
            return back()->with('success', ' Updated successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }


    public function promotionStore(ProductPromotionRequest $request){
        // dd($request->all());
        try{
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(602,  548);
                $processedImage->save(public_path('upload/promotion/') . $imageName);
            }

            $existingPromotion = ProductPromotion::first();

            if ($existingPromotion) {
                $existingPromotion->update([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'description' => $request->description,
                    'image' => $imageName ?? $existingPromotion->image,
                ]);
            } else {
                ProductPromotion::create([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'description' => $request->description,
                    'image' => $imageName,
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
            if (Plugin::count()) {
                Plugin::first()->update($request->validated());
            }else{
                Plugin::create($request->validated());
            }
            return back()->with('success', 'Updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }


    public function shippingIndex(){
        $shipping = Shipping::orderBy('id', 'desc')->get();
        return view('admin.shipping.index',[
            'shippings'=>$shipping,
        ]);
    }

    public function shippingCreate(){
        return view('admin.shipping.create');
    }


    public function shippingEdit($id){
        $shipping = Shipping::find($id);
        return view('admin.shipping.edit', compact('shipping'));
    }


    public function shippingStore(ShippingRequest $request){
        try{
            // dd($request->all());
            Shipping::create($request->all());
            return redirect()->route('admin.shipping.index')->with('success','shipping order added successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }

    public function shippingUpdate(ShippingRequest $request, $id){
        try{
            // dd($request->all());
            $shipping = Shipping::findOrFail($id);
            $shipping->update([
                'title'=>$request->title,
                'price'=>$request->price,
                'status'=>$request->status,
            ]);
            return redirect()->route('admin.shipping.index')->with('success','shipping order updated successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }


    public function shippingDelete($id){
        try {
            $shipping = Shipping::findOrFail($id);
            $shipping->delete();
            return back()->with('success', 'shipping delete');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }

    public function  sliderIndex(){
        $slide = Slider::orderBy('id', 'desc')->get();
        return view('admin.slider.index',['sliders'=>$slide]);
    }

    public function sliderCreate(){
        return view('admin.slider.create');
    }

    public function sliderStore(SliderRequest $request){
        try{
            // resize image with intervention image version 3
            $imageName = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(824, 582);
                $processedImage->save(public_path('upload/slider/') . $imageName);
            }

            Slider::create([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'description'=>$request->description,
                'image'=>$imageName,
            ]);
            return redirect()->route('admin.slider.index')->with('success', ' Updated successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred');
        }
    }

    public function sliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',[
            'slide' => $slider
        ]);
    }

    public function sliderUpdate(Request $request, $id){
        try {

            // resize image with intervention image version 3
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(824, 582);
                $processedImage->save(public_path('upload/slider/') . $imageName);
            }


            $slider = Slider::findOrFail($id);
            $slider->update([
                'title'=>$request->input('title'),
                'sub_title'=>$request->input('sub_title'),
                'description'=>$request->input('description'),
                'image'=>$imageName ?? $slider->image,
            ]);
            return redirect()->route('admin.slider.index')->with('success', 'Updated successfully');
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
