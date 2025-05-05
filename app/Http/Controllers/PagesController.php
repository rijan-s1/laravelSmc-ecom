<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('welcome');
        $latestproducts = Product::latest()->limit(4)->get();
        return view('welcome',compact('latestproducts'));
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
}
