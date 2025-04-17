@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="flex justify-end mb-3">
    <a href="{{route('category.create')}}" class="bg-blue-700 text-white px-4 py-2 rounded-lg">Create Category</a>
</div>
<table class="w-full ">
    <tr class="bg-gray-200">
        <th class="p-3 border border-gray-300">Order</th>
        <th class="p-3 border border-gray-300">Category Name</th>
        <th class="p-3 border border-gray-300">Action</th>
    </tr>
    @foreach ($categories as $category)
    <tr class="text-center">
    <td class="p-3 border">{{$category->priority}}</td>
    <td class="p-3 border">{{ $category->name }}</td>
    <td class="p-3 border">
        <a href="" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</a>
        <a href="" class="bg-red-600 text-white px-4 py-2 rounded-lg">Delete</a>
    </td>
    </tr>
    @endforeach
</table>
@endsection
