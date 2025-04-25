@extends('layouts.app')
@section('title', 'Add Product')
@section('content')
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="category_id" type="text"
            class="border border-gray-300 p-2 rounded-lg w-full mb-4">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach


        </select>
        @error('category_id')
            <p class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</p>
        @enderror
        <input type="text" name="name" placeholder="Product Name"
            class="border border-gray-300 p-2 rounded-lg mb-4 w-full" value="{{ old('name') }}">
        @error('name')
            <p class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</p>
        @enderror
        <input type="text" name="price" placeholder="Price" class="border border-gray-300 p-2 rounded-lg mb-4 w-full"
            value="{{ old('price') }}">
        @error('price')
            <p class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</p>
        @enderror
        <input type="text" name="discounted_price" placeholder="Discounted Price"
            class="border border-gray-300 p-2 rounded-lg mb-4 w-full" value="{{ old('discounted_price') }}">
        @error('discounted_price')
            <p class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</p>
        @enderror
        <input type="text" name="stock" placeholder="Stock" class="border border-gray-300 p-2 rounded-lg mb-4 w-full"
            value="{{ old('stock') }}">
        @error('stock')
            <p class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</p>
        @enderror
        <textarea name="description" placeholder="Product Description" class="border border-gray-300 p-2 rounded-lg w-full mb-4"
            value="{{ old('description') }}"></textarea>
            @error('description')
            <p class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</p>
            @enderror
        <input type="file" name="photopath" placeholder="Product Image" class="border border-gray-300 p-2 rounded-lg mb-4 w-full">
        @error('photopath')
            <p class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</p>
        @enderror
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Create Product</button>
            <a href="{{route('product.index')}}" class="bg-red-600 text-white px-4 py-2 rounded-lg ml-4">Back</a>
        </div>
    </form>
@endsection('content')
