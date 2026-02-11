@extends('layouts.app')

@section('title', 'ShopLaravel')

@section('content')
    <div class="container" style="padding: 20px;">
        <div style="display: flex; gap: 30px;">
            <h1><strong>Liste des produits :</strong></h1>
            <a href="{{ route('products.create') }}"
               style="background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                Créer nouveau produit
            </a>
        </div>

        @if(isset($products) && $products->count() > 0)
            <div style="display: flex; flex-wrap: wrap; gap: 30px;">
                @foreach($products as $product)
                    <div>
                        <div
                            style="border: 3px solid #ddd; border-radius: 8px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); height: 100%; display: flex; flex-direction: column;">
                            <h5 style="font-size: 1.25rem; margin-bottom: 10px;">{{ $product->name }}</h5>
                            <p style="color: #6c757d; margin-bottom: 15px;">{{ Str::limit($product->description, 100) }}</p>
                            <p style="color: #6c757d; margin-bottom: 15px;">{{ Str::limit($product->category, 100) }}</p>

                            <div style="margin-top: auto;">
                                <p style="color: #0d6efd; font-weight: bold; font-size: 1.5rem; margin-bottom: 10px;">
                                    {{ number_format($product->price, 2) }} €
                                </p>

                                <div style="margin-bottom: 15px;">
                                    @if($product->stock > 10)
                                        <span
                                            style="background-color: limegreen; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.85rem;">
                                            En stock ({{ $product->stock }})
                                        </span>
                                    @elseif ($product->stock < 10 && $product->stock > 0)
                                        <span
                                            style="background-color: orange; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.85rem;">
                                            Derniers articles ({{ $product->stock }})
                                        </span>
                                    @else
                                        <span
                                            style="background-color: red; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.85rem;">
                                            Rupture de stock ({{ $product->stock }})
                                        </span>
                                    @endif

                                    @if(isset($product->active))
                                        @if($product->active)
                                            <span
                                                style="background-color: #17a2b8; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.85rem;">
                                                Actif
                                            </span>
                                        @else
                                            <span
                                                style="background-color: #6c757d; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.85rem;">
                                                Inactif
                                            </span>
                                        @endif
                                    @endif
                                </div>

                                <div style="display: flex; flex-direction: column; gap: 10px;">
                                    <a href="{{ route('products.show', $product->id) }}"
                                       style="background-color: lightblue; color: green; padding: 8px; text-align: center; text-decoration: none; border-radius: 5px; font-size: 0.85rem; border: none; cursor: pointer; display: block;">
                                        Voir détails
                                    </a>

                                    <a href="{{ route('products.edit', $product->id) }}"
                                       style="background-color: lightblue; color: blue; padding: 8px; text-align: center; text-decoration: none; border-radius: 5px; font-size: 0.85rem; border: none; cursor: pointer; display: block;">
                                        Modifier
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}"
                                          method="POST" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="width: 100%; background-color: lightblue; color: red; padding: 8px; text-align: center; border-radius: 5px; font-size: 0.85rem; border: none; cursor: pointer;"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination si nécessaire --}}
            @if(method_exists($products, 'links'))
                <div style="display: flex; justify-content: center; margin-top: 30px;">
                    {{ $products->links() }}
                </div>
            @endif
        @else
            <div
                style="background-color: #d1ecf1; color: #0c5460; padding: 20px; border-radius: 5px; text-align: center;">
                <h4>Aucun produit pour le moment</h4>
                <p>Commencez par <a href="{{ route('products.create') }}">créer votre premier produit</a> !</p>
            </div>
        @endif
    </div>
@endsection
