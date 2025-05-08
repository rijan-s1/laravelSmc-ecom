<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $latestproducts = Product::latest()->limit(4)->get();
        return view('welcome',compact('latestproducts'));
    }
    public function categoryproducts($catid){
        $category = Category::find($catid);
        $products = Product::where('category_id',$catid)->paginate(4);
        return view('categoryproduct',compact('products','category'));
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function viewproduct($id){
        $product = Product::find($id);
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit(4)->get();
        return view('viewproduct',compact('product','relatedProducts'));
    }
}
