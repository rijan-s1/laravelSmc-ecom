@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="grid grid-cols-3 gap-5 "> 
    <div class="bg-blue-100 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold">Total Products</h2>
        <p class="text-3xl font-bold">150</p>
    </div>
    <div class="bg-red-100 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold">Pending Orders</h2>
        <p class="text-3xl font-bold">150</p>
    </div>
    <div class="bg-green-100 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold">Processing Products</h2>
        <p class="text-3xl font-bold">150</p>
    </div>
    <div class="bg-yellow-100 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold">Total Users</h2>
        <p class="text-3xl font-bold">150</p>
    </div>
    <div class="bg-pink-100 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold">Total Categories</h2>
        <p class="text-3xl font-bold">150</p>
    </div>
    <div class="bg-zinc-200 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold">Total Sales</h2>
        <p class="text-3xl font-bold">150</p>
    </div>
</div>
@endsection