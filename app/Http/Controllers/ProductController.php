<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }
    public function create()
    {
        $categories = Category::orderBY('priority')->get();
        return view('product.create', compact('categories'));

    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required',
            'price' => 'required|numeric|min:0',
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
public function edit($id){
    $product = Product::find($id);
    $categories = Category::orderBY('priority')->get();
    return view('product.edit', compact('product', 'categories'));
}
public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|string',
        'category_id' => 'required',
        'price' => 'required|numeric|min:0',
        'discounted_price' => 'nullable|numeric|lt:price',
        'description' => 'required',
        'stock' => 'required|integer|min:0',
        'photopath'=>'nullable|image|mimes:jpeg,png,jpg,|max:2048'
    ]);
    $product = Product::find($id);
    if ($request->hasFile('photopath')) {
        $file = $request->file('photopath');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['photopath'] = $filename;
            //delete old file
            if(file_exists(public_path('images/'.$product->photopath))){
                unlink(public_path('images/'.$product->photopath));
            }
    }
else{
    $data['photopath'] = $product->photopath;
}
$product->update($data);
    return redirect()->route('product.index');
}
public function destroy(Request $request)
{
    $product = Product::find($request->id);
    if(file_exists(public_path('images/'.$product->photopath))){
        unlink(public_path('images/'.$product->photopath));
    }
    $product->delete();
    return redirect()->route('product.index');
}
}
