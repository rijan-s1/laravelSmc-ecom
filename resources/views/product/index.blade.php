@extends('layouts.app')
@section('title', 'Products')
@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Products</h1>
    <a href="" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</a>
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
    <tr class="text-center">
        <td class="p-3 border">Images</td>
        <td class="p-3 border">Product Name</td>
        <td class="p-3 border">Product</td>
        <td class="p-3 border">100</td>
        <td class="p-3 border">800</td>
        <td class="p-3 border">5</td>
        <td class="p-3 border">elec</td>
        <td class="p-3 border">sdit delete</td>

    </tr>

</table>
@endsection('content')
