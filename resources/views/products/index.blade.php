@extends('layouts.app')

@section('title', 'ShopLaravel')

@section('content')

    @foreach ($products as $product)

        <h1>{{ $product['name'] }}</h1>

        <h4>Produit numéro : {{ $product['id'] }}</h4>

        <p>Prix : {{$product['price']}} €</p>

        @if ($product['availability'])
            <p style="color: green;">Dispo</p>
        @else
            <p style="color: red;">Indispo</p>
        @endif3

        <p> ----------------------------------------------------- </p>

    @endforeach

@endsection
