@extends('layouts.app')

@section('title', 'Modifier le produit')

@section('content')
    <div class="form-container">
        <h1>Modifier le produit : {{ $product->name }}</h1>

        {{-- Le formulaire envoie vers posts.update avec la méthode PUT --}}
        <form action="{{ route('posts.update', $product->id) }}" method="POST">

            {{-- Protection CSRF --}}
            @csrf

            {{-- Directive Blade pour simuler la méthode PUT --}}
            @method('PUT')

            {{-- Champ Nom --}}
            <label for="name">Nom du produit :</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $product->name) }}"
                placeholder="Ex: iPhone 15"
                required
            >
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror

            {{-- Champ Description --}}
            <label for="description">Description :</label>
            <textarea
                id="description"
                name="description"
                rows="4"
                placeholder="Décrivez le produit..."
            >{{ old('description', $product->description) }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror

            {{-- Prix --}}
            <label for="price">Prix (€) :</label>
            <input
                type="number"
                id="price"
                name="price"
                step="0.01"
                value="{{ old('price', $product->price) }}"
                placeholder="Ex: 999.99"
                required
            >
            @error('price')
            <div class="error">{{ $message }}</div>
            @enderror

            {{-- Stock --}}
            <div>
                <label for="stock">Quantité en stock :</label>
                <input
                    type="number"
                    id="stock"
                    name="stock"
                    value="{{ old('stock', $product->stock) }}"
                    placeholder="Ex: 50"
                    required
                >
                @error('stock')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Actif --}}
            <div>
                <label>
                    <input
                        type="checkbox"
                        id="active"
                        name="active"
                        value="1"
                        {{ old('active', $product->active) ? 'checked' : '' }}
                    >
                    Produit actif (visible sur le site)
                </label>
            </div>

            {{-- Boutons --}}
            <div>
                <button type="submit" class="btn-primary">💾 Enregistrer les modifications</button>
                <a href="{{ route('posts.index') }}" class="btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
