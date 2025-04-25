<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }
    public function create()
    {
        $categories = Category::orderBY('priority')->get();
        return view('product.create', compact('categories'));

    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric|min0',
            'discounted_price' => 'nullable|numeric|lt:price',
            'description' => 'required',
            'stock' => 'required|integer|min:0',
            'photopath'=>'required|image|mimes:jpeg,png,jpg,|max:2048'  ]);
            $file = $request->file('photopath');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['photopath'] = $filename;

            Product::create($data);
            return redirect()->route('product.index');
}
}
