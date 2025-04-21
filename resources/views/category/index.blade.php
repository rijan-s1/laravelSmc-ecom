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
        <a href="{{route('category.edit',$category->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</a>
        <a onclick="deleteFunction('{{$category->id}}')" class="bg-red-600 text-white px-4 py-2 rounded-lg cursor-pointer">Delete</a>
    </td>
    </tr>
    @endforeach
</table>
<div id="delete-popup" class="hidden fixed inset-0 bg-blue-500 bg-opacity-50 backdrop-blur-sm  items-center justify-center">
    <form action="{{route('category.destroy')}}" method="POST" class="bg-white px-10 py-6 rounded-lg shadow text-center">
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
@endsection
