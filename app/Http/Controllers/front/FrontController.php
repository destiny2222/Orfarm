<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('frontend.index');
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

    public function portfolio(){
        return view('front.portfolio');
    }

    public function portfolio_details(){
        return view('front.portfolio_details');
    }

    public function pricing(){
    }
}
