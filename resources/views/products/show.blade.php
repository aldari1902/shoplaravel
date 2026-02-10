@extends('layouts.app')

@section('title', 'ShopLaravel')

@section('content')

    <h1>{{ $product['name'] }}</h1>

    <h4>Description :{{ $product['description'] }}</h4>

    <p>Prix : {{$product['price']}} €</p>

    @if ($product['stock'])
        <p style="color: green;">Dispo</p>
    @else
        <p style="color: red;">Indispo</p>
    @endif

@endsection
