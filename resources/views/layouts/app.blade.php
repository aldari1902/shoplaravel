<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopLaravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

<header class="text-white p-4" style="background: linear-gradient(90deg, #0d47a1, #42a5f5);">
    <nav class="container mx-auto">

        <a href="{{ route('home') }}" class="font-bold text-xl">LegoShop - Laravel</a>
        <a href="{{ route('products.index') }}" class="ml-4">Products</a>
        <a href="{{ route('about') }}" class="ml-4">About</a>
        <a href="{{ route('contact') }}" class="ml-4">Contact</a>

        <a href="{{ route('cart.index') }}" class="relative inline-block" class="ml-4"
           style="display: flex; flex-direction: row-reverse">
            Panier 🧺
            @php
                $cartCount = session('cart') ? count(session('cart')) : 0;
            @endphp
            @if($cartCount > 0)
                <p class=" absolute -top-2 -right-2 bg-red-600 text-white text-xs
           font-bold rounded-full px-2 py-1">
                    {{ $cartCount }}
                </p>
            @endif
        </a>

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
