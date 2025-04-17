<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('priority','asc')->get();
        return view('category.index',compact('categories'));
    }
    public function create(){
        return view('category.create');
    }
    public function store(Request $request){
        $data =$request-> validate([
            'name'=>'required|alpha',
            'priority'=>'required|integer|gt:0',
        ]);
        Category::create($data);
        return redirect()->route('category.index');

    }

}
