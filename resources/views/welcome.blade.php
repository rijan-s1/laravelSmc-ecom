@extends('layouts.master')
@section('content')
<h1>This is homepage</h1>
<div class="px-20 py-10">
    <h1 class="font-bold text-xl border-l-4 pl-2 border-blue-500">Latest Products</h1>
    <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-4 py-2">
        @foreach($latestproducts as $product)
        <div class="border rounded-lg shadow">
            <img src="{{asset('images/'.$product->photopath)}}" alt="" class="w-full h-44 object-cover rounded-t-lg">
            <div class="p-2">
                <h2 class="font-bold">{{$product->name}}</h2>
                <div class="text-yellow-600">
                    @if($product->discounted_price != '')
                    <span class="text-sm line-through text-gray-500">Rs. {{$product->price}}</span>
                    Rs. {{$product->discounted_price}}
                    @else
                    Rs. {{$product->price}}
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
