<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
      <div class="flex">
        <div class="bg-gray-100 shadow-md w-52 h-screen">
            <img src="{{asset('logo.png')}}" alt="LOGO" class="w-36 mt-5 mx-auto ">
            <div class="mt-4 grid text-lg ">
            <a href="{{route('dashboard')}}" class="pl-4 hover:bg-gray-200 py-2 border-b">Dashboard</a>
            <a href="{{route('category.index')}}" class="pl-4 hover:bg-gray-200 py-2 border-b">Categories</a>
            <a href="{{route('product.index')}}" class="pl-4 hover:bg-gray-200 py-2 border-b">Products</a>
            <a href="" class="pl-4 hover:bg-gray-200 py-2 border-b">Orders</a>
            <form action="{{route('logout')}}" method="post" class="pl-4 hover:bg-gray-200" >
                @csrf
                <button type="submit" class="w-full text-left py-2 border-b">Logout</button>
            </form>
            </div>
        </div>
        <div class="p-4 flex-1">

          <h1 class="font-bold text-3xl ">@yield('title')</h1>
          <hr class="bg-red-600 h-1.5 mb-5">
          @yield('content')
        </div>
      </div>
    </body>
</html>
