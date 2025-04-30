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
        <td class="p-3 border">
            <a href="{{route('product.edit',$product->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Edit</a>
            <a onclick="deleteFunction('{{$product->id}}')" class="bg-red-500 text-white px-4 py-2 rounded-lg cursor-pointer">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
<div id="delete-popup" class="hidden fixed inset-0 bg-blue-500 bg-opacity-50 backdrop-blur-sm  items-center justify-center">
    <form action="{{route('product.destroy')}}" method="POST" class="bg-white px-10 py-6 rounded-lg shadow text-center">
        @csrf
        <input type="hidden" name="id" id="dataid">
        <p class="font-bold text-lg">Are You Sure to Delete?</p>
        <div class="flex gap-4 mt-5">
            <button type="submit" class="bg-blue-600 text-white px-10 py-2 rounded-lg">Yes</button>
            <div onclick="hidePopup()" class="bg-red-600 text-white px-10 py-2 rounded-lg cursor-pointer">No</div>
        </div>
    </form>

</div>
<script>
    function deleteFunction(id) {
        document.getElementById('delete-popup').classList.remove('hidden');
        document.getElementById('delete-popup').classList.add('flex');
        document.getElementById('dataid').value = id;
    }
    function hidePopup() {
        document.getElementById('delete-popup').classList.remove('flex');
        document.getElementById('delete-popup').classList.add('hidden');
    }


</script>
@endsection('content')
