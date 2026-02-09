<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un produit</title>
    <style>
        body {
            font-family: Arial;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
<h1>Créer un nouveau produit</h1>

{{-- Le formulaire envoie les données vers la route "posts.store" --}}
<form action="{{ route('posts.store') }}" method="POST">

    {{-- Protection CSRF : OBLIGATOIRE pour tous les formulaires Laravel --}}
    @csrf

    {{-- Champ Nom --}}
    <div>
        <label for="name">Nom du produit :</label>
        <input type="text" id="name" name="name" placeholder="Ex: La signature de Martin" required>
    </div>

    {{-- Champ Description --}}
    <div>
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4"
                  placeholder="Décrivez le produit... exemple : il a encore oublié de signer..."></textarea>
    </div>

    {{-- Champ Prix --}}
    <div>
        <label for="price">Prix (€) :</label>
        <input type="number" id="price" name="price" step="0.01" placeholder="Ex: 99.99" required>
    </div>

    {{-- Champ Stock --}}
    <div>
        <label for="stock">Quantité en stock :</label>
        <input type="number" id="stock" name="stock" placeholder="Ex: 50" required>
    </div>

    {{-- Champ Actif (checkbox) --}}
    <div>
        <label>
            <input type="checkbox" id="active" name="active" value="1" checked>
            Produit actif (visible sur le site)
        </label>
    </div>

    {{-- Bouton de soumission --}}
    <div>
        <button type="submit">✓ Créer le produit</button>
    </div>
</form>
</body>
</html>
