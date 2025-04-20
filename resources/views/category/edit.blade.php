@extends('layouts.app')
@section('title', 'Edit Category')
@section ('content')
<form action="{{route('category.update',$category->id)}}" method="POST">
    @csrf
    <input type="text" name="priority" placeholder="Priority"  class="border border-gray-300 p-2 rounded-lg mb-4 w-full" value="{{$category->priority}}">
    @error('priority')
    <p class="text-red-500 text-sm mb-2 -mt-4">{{$message}}</p>
    @enderror
    <input type="text" name="name" placeholder="Category Name" class="border border-gray-300 p-2 rounded-lg mb-4 w-full" value="{{$category->name}}">
    @error('name')
    <p class="text-red-500 text-sm mb-2 -mt-4">{{$message}}</p>
    @enderror
    <div class="flex justify-center gap-4">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit Category</button>
    <a href="{{route('category.index')}}" class="bg-red-600 text-white px-4 py-2 rounded-lg ">Cancel</a>
    </div>
</form>
@endsection
