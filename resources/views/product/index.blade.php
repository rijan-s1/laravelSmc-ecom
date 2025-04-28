@extends('layouts.app')
@section('title', 'Products')
@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Products</h1>
    <a href="{{route('product.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</a>
</div>
<table class="w-full">
    <tr class="bg-gray-200">
        <th class="p-3 border border-gray-300">Product Image</th>
        <th class="p-3 border border-gray-300">Product Name</th>
        <th class="p-3 border border-gray-300">Description</th>
        <th class="p-3 border border-gray-300">Price</th>
        <th class="p-3 border border-gray-300">Discounted price</th>
        <th class="p-3 border border-gray-300">Stock</th>
        <th class="p-3 border border-gray-300">Category</th>
        <th class="p-3 border border-gray-300">Action</th>
    </tr>
    @foreach ($products as $product )
    <tr class="text-center">
        <td class="p-3 border"><img src="{{asset('images/'.$product->photopath)}}" alt="" class="h-16 mx-auto"></td>
        <td class="p-3 border">{{$product->name}}</td>
        <td class="p-3 border">{{$product->description}}</td>
        <td class="p-3 border">{{$product->price}}</td>
        <td class="p-3 border">{{$product->discounted_price}}</td>
        <td class="p-3 border">{{$product->stock}}</td>
        <td class="p-3 border">{{$product->category->name}}</td>
        <td class="p-3 border">edit delete</td>
    </tr>
    @endforeach
</table>
@endsection('content')
