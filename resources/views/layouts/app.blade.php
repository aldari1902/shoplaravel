<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopLaravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

<header class="bg-blue-600 text-white p-4">
    <nav class="container mx-auto">

        <a href="{{ route('home') }}" class="font-bold text-xl">LegoShop - Laravel</a>
        <a href="{{ route('products.index') }}" class="ml-4">Products</a>
        <a href="{{ route('about') }}" class="ml-4">About</a>
        <a href="{{ route('contact') }}" class="ml-4">Contact</a>
        <a href="{{ route('cart.index') }}" class="ml-4">Panier</a>

    </nav>
</header>

<main class="container mx-auto py-8">

    @yield('content')

</main>


<footer class="bg-gray-800 text-white p-4 mt-8">
    <div class="container mx-auto text-center">

        &copy; {{ date('Y') }} ShopLaravel - Laravel > Php

    </div>
</footer>

</body>
</html>
