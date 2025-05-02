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
            'name'=>'required|string',
            'priority'=>'required|integer|gt:0|unique:categories,priority',
        ]);
        Category::create($data);
        return redirect()->route('category.index')->with('success','Category created successfully');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }
    public function update(Request $request, $id){
        $data =$request-> validate([
            'name'=>'required',
            'priority'=>'required|integer|gt:0|unique:categories,priority,' .$id,
        ]);
        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('category.index')->with('success','Category updated successfully');
        }
        public function destroy(Request $request){
            //delete logic here
            $category = Category::find($request->id);
            $category->delete();
            return redirect()->route('category.index')->with('success','Category Deleted Successfully');
        }
}
