<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"> </script>
</head>
<body>
   <nav class="shadow px-20 py-4 flex justify-between items-center"> 
    <img src="https://smc.edu.np/wp-content/uploads/2023/11/smc-logo-circle-150x150.png" alt="" class="h-20">
    <div class="flex gap-4"> 
        <a href="/" class="text-gray-600">Home</a>
        <a href="/about" class="text-gray-600">About</a>
        <a href="/contact" class="text-gray-600">Contact</a>
        <a href="" class="text-gray-600">Login</a>
    </div>
   </nav>
   @yield('content')
   <footer class="bg-blue-800 text-white text-center py-4 mt-10" >
    <p>&copy; 2025 SMC | All Rights Reserved</p>

   </footer>
</body>
</html>