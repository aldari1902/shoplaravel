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
        @endif

        <p> ----------------------------------------------------- </p>

    @endforeach

    @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="text-primary fw-bold">{{ $product->price }} €</p>

                    @if($product->stock > 0)
                        <span class="badge bg-success">En stock ({{ $product->stock }})</span>
                    @else
                        <span class="badge bg-danger">Rupture de stock</span>
                    @endif

                    <a href="{{ route('products.show', $product->id) }}"
                       class="btn btn-primary mt-2">
                        Voir détails
                    </a>
                </div>
            </div>
        </div>
    @endforeach

@endsection
