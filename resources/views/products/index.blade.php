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

@section('content')
    <div class="products-container">
        <h1>Liste des produits</h1>

        <a href="{{ route('posts.create') }}" class="btn-create">➕ Créer un produit</a>

        @if(isset($products) && $products->count() > 0)
            <table>
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>{{ number_format($product->price, 2) }} €</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if($product->active)
                                <span class="badge badge-active">Actif</span>
                            @else
                                <span class="badge badge-inactive">Inactif</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('posts.edit', $product->id) }}" class="btn-edit">
                                ✏️ Modifier
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun produit pour le moment. <a href="{{ route('posts.create') }}">Créez-en un !</a></p>
        @endif
    </div>
@endsection
