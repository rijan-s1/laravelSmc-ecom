<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-blue-800 text-white flex justify-end py-1 px-20">
        @auth
        <div class="flex items-center gap-2">
            <span class="text-sm font-bold">Hi, {{auth()->user()->name}}</span>

        </div>
        @else
        <a href="{{route('login')}}" class="text-sm font-bold">Login</a>
        @endauth

    </div>
   <nav class="shadow px-20 py-4 flex justify-between items-center">
    <img src="https://smc.edu.np/wp-content/uploads/2023/11/smc-logo-circle-150x150.png" alt="" class="h-20">
    <div class="flex gap-4">
        <a href="/" class="text-gray-600">Home</a>
        @php
            $categories = \App\Models\Category::orderBy('priority','asc')->get();
        @endphp
        @foreach ($categories as $category)
<a href="{{route('categoryproducts',$category->id)}}" class="text-gray-600">{{$category->name}}</a>
        @endforeach
        <a href="{{route('login')}}" class="text-gray-600">Login</a>
    </div>
   </nav>
   <div class="mx-12">@yield('content')</div>

   <footer class="bg-blue-800 text-white text-center py-4 mt-10" >
    <p>&copy; 2025 SMC | All Rights Reserved</p>

   </footer>
</body>
</html>
