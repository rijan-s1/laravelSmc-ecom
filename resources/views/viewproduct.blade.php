@extends('layouts.master')

@section('content')
    <div class="container mx-auto py-12">

        <!-- Product Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
                <!-- Product Image Section -->
                <div class="space-y-4">
                    <div class="overflow-hidden rounded-lg bg-gray-50 flex items-center justify-center">
                        <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}"
                            class="w-full h-64 object-contain transition-transform hover:scale-105 duration-300">
                    </div>

                    <!-- Product Thumbnails (optional) -->
                    <div class="grid grid-cols-4 gap-2">
                        @if(isset($product->gallery) && count($product->gallery) > 0)
                            @foreach($product->gallery as $image)
                                <div class="cursor-pointer rounded-md overflow-hidden border-2 border-transparent hover:border-blue-500">
                                    <img src="{{ asset('images/' . $image) }}" alt="Product view" class="w-full h-20 object-cover">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="flex flex-col justify-between">
                    <div>
                        <!-- Category Badge -->
                        <a href="{{ route('categoryproducts', $product->category->id) }}" class="inline-block mb-3 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-medium hover:bg-blue-100 transition-colors">
                            {{ $product->category->name }}
                        </a>

                        <!-- Product Title -->
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>

                        <!-- Price Display -->
                        <div class="flex items-center mb-6">
                            @if ($product->discounted_price !== null)
                                <span class="text-2xl font-bold text-blue-600 mr-3">Rs. {{ number_format($product->discounted_price) }}</span>
                                <span class="text-lg text-gray-500 line-through">Rs. {{ number_format($product->price) }}</span>
                                <span class="ml-3 bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-medium">
                                    {{ round((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                                </span>
                            @else
                                <span class="text-2xl font-bold text-gray-800">Rs. {{ number_format($product->price) }}</span>
                            @endif
                        </div>

                        <!-- Product Description -->
                        <div class="prose prose-sm text-gray-700 mb-6">
                            <p class="leading-relaxed">{{ $product->description }}</p>
                        </div>

                        <!-- Product Specifications -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Product Details</h3>
                            <div class="grid grid-cols-1 gap-2">
                                <!-- Availability Status -->
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">Stock</span>
                                    @if ($product->stock > 0)
                                        <span class="inline-flex items-center text-green-600 font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            In Stock ({{ $product->stock }} units)
                                        </span>
                                    @else
                                        <span class="inline-flex items-center text-red-600 font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                            </svg>
                                            Out of Stock
                                        </span>
                                    @endif
                                </div>

                                <!-- Add more specifications as needed -->
                                @if(isset($product->sku))
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">SKU</span>
                                    <span class="text-gray-800">{{ $product->sku }}</span>
                                </div>
                                @endif

                                @if(isset($product->weight))
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">Weight</span>
                                    <span class="text-gray-800">{{ $product->weight }} kg</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="py-2 flex items-center">
                        <button onclick="decrement()" class="bg-gray-100 p-2 w-10 rounded">-</button>
                        <input  id ="quantity" type="number" value="1" min="1" max="{{ $product->stock }}" class="border border-gray-300 p-2 rounded w-16 text-center mx-2" readonly>
                        <button onclick="increment()" class="bg-gray-100 p-2 w-10 rounded">+</button>
                    </div>

                    <!-- Call to Action Section -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 mt-6">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50"
                            {{ $product->stock <= 0 ? 'disabled' : '' }}>
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Add to Cart
                        </button>

                        <button class="flex-1 sm:flex-none border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-medium py-3 px-6 rounded-lg shadow-sm transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Related Products Section (Optional) -->
        @if(isset($relatedProducts) && count($relatedProducts) > 0)
        <div class="mt-12">
        <h1 class="font-bold text-xl border-l-4 pl-2 border-blue-500">Similar Products</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <!-- Product Card -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <a href="{{ route('viewproduct', $relatedProduct->id) }}">
                            <img src="{{ asset('images/' . $relatedProduct->photopath) }}" alt="{{ $relatedProduct->name }}"
                                class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4">
                            <a href="{{ route('categoryproducts', $relatedProduct->category->id) }}" class="text-xs text-blue-600 font-medium hover:underline">
                                {{ $relatedProduct->category->name }}
                            </a>
                            <a href="{{ route('viewproduct', $relatedProduct->id) }}" class="block mt-1">
                                <h3 class="text-lg font-semibold text-gray-900 hover:text-blue-600">{{ $relatedProduct->name }}</h3>
                            </a>
                            <div class="mt-2 flex items-center">
                                @if ($relatedProduct->discounted_price !== null)
                                    <span class="text-md font-bold text-blue-600 mr-2">Rs. {{ number_format($relatedProduct->discounted_price) }}</span>
                                    <span class="text-sm text-gray-500 line-through">Rs. {{ number_format($relatedProduct->price) }}</span>
                                @else
                                    <span class="text-md font-bold text-gray-800">Rs. {{ number_format($relatedProduct->price) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <script>
        let stock = {{ $product->stock }};
        function increment(){
            let quantity = document.getElementById('quantity');
            if(quantity.value < stock){
                quantity.value = parseInt(quantity.value) + 1;
            }
        }
        function decrement(){
            let quantity = document.getElementById('quantity');
            if(quantity.value > 1){
                quantity.value = parseInt(quantity.value) - 1;
            }
        }
    </script>
@endsection
