@extends('layouts.app')

@section('title', 'Panier')

@section('content')

    <h1><strong>Panier :</strong></h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container" style="padding: 20px;">

        @if(isset($cart) && count($cart) > 0)
            <div style="display: flex; flex-direction: column; gap: 20px;">
                @php
                    $total = 0;
                @endphp

                @foreach($cart as $item)
                    @php
                        $subtotal = $item['product']->price * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div
                        style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <div style="flex: 1;">
                            <h5 style="margin: 0 0 5px 0;">{{ $item['product']->name }}</h5>
                            <p style="margin: 0; color: #6c757d;">{{ Str::limit($item['product']->description, 50) }}</p>
                            <p style="margin: 5px 0 0 0; color: #0d6efd; font-weight: bold;">{{ number_format($item['product']->price, 2) }}
                                €</p>
                        </div>

                        <div style="display: flex; align-items: center; gap: 10px;">
                            <form action="{{ route('cart.update', $item['product']->id) }}" method="POST"
                                  style="display: flex; align-items: center; gap: 5px;">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                       style="width: 60px; padding: 4px; border-radius: 5px; border: 1px solid #ccc;">
                                <button type="submit"
                                        style="background-color: #28a745; color: white; padding: 4px 8px; border-radius: 5px; border: none; cursor: pointer;">
                                    Mettre à jour
                                </button>
                            </form>

                            <form action="{{ route('cart.destroy', $item['product']->id) }}" method="POST"
                                  style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="background-color: orangered; color: white; padding: 4px 8px; border-radius: 5px; border: none; cursor: pointer;"
                                        onclick="return confirm('Supprimer ce produit du panier ?')">
                                    Supprimer
                                </button>
                            </form>
                        </div>

                        <div style="margin-left: 20px; font-weight: bold;">
                            {{ number_format($subtotal, 2) }} €
                        </div>
                    </div>
                @endforeach

                <div style="text-align: right; margin-top: 20px; font-size: 1.25rem; font-weight: bold;">
                    Total : {{ number_format($total, 2) }} €
                </div>

                <div style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 10px;">
                    <a href="{{ route('products.index') }}"
                       style="background-color: dodgerblue; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                        Continuer le shopping ;)
                    </a>
                </div>
            </div>
        @else
            <div
                style="background-color: #d1ecf1; color: #0c5460; padding: 20px; border-radius: 5px; text-align: center;">
                <h4>Panier vide :'(</h4>
                <button type="submit"
                        style="width: 100%; background-color: limegreen; color: white; padding: 4px; border-radius: 5px; font-size: 0.85rem; border: none; cursor: pointer; width: fit-content;">
                    <a href="{{ route('products.index') }}">Direction la boutique!</a></button>
            </div>
        @endif
    </div>

@endsection
