@extends('layouts.app')

@section('title', 'ShopLaravel')

@section('content')
    <a href="{{ route('products.create') }}"
       class="btn btn-success">
        Nouveau produit
    </a>
    <br>
    </br>
    <br>
    </br>

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
                    <a href="{{ route('products.edit', $product->id) }}"
                       class="btn btn-primary mt-2">
                        Modifier</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger mt-2"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('content')
    <div class="products-container">
        <h1>Liste des produits</h1>

        <a href="{{ route('products.create') }}" class="btn-create">➕ Créer un produit</a>

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
                            <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">Modifier</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun produit pour le moment. <a href="{{ route('products.create') }}">Créez-en un !</a></p>
        @endif
    </div>
@endsection
