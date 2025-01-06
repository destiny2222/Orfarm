<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PostController extends Controller
{
    public function index(){
        $post = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.post.index',[
            'posts'=>$post,
        ]);
    }

    public function create(){
        return view('admin.post.create');
    }

    public function store(Request $request){
        //dd($request->all());
        $request->validate([ 
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            // 'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ]);

        try {
            $imageName = null;
            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(500, 321);
                $processedImage->save(public_path('upload/post/') . $imageName);
            }
    
            Post::create([
                'title' => $request->title,
                'slug'=> Str::slug($request->title),
                'description' => $request->description,
                'image' => $imageName,
            ]);
            return redirect()->route('admin.post.index')->with('success', 'Post created successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Something went wrong');
        }
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, $id){
        $request->validate([ 
            'title' => ['required','string'],
            'description' => ['required','string'],
            // 'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        try {
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(500, 321);
                $processedImage->save(public_path('upload/post/') . $imageName);
            }
            
            $post = Post::findOrFail($id);
            $processedImage->resize(500, 321);
            $post->update([
                'title' => $request->title,
               'slug'=> Str::slug($request->title),
                'description' => $request->description,
                'image'=>$imageName ?? $post->image,
            ]);
            return redirect()->route('admin.post.index')->with('success', 'Post updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Something went wrong');
        }
    }

    public function destroy($id){
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Something went wrong');
        }
    }
}
