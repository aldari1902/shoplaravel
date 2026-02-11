<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Product $product, Request $request)
    {
        $quantity = $request->input('quantity', 1);

        return redirect()->route('cart.index')->with('success', 'Ajouté au panier.');
    }

    public function update(Product $product, Request $request)
    {
        $quantity = $request->input('quantity', 1);

        return redirect()->route('cart.index')->with('success', 'Panier mis à jour');
    }

    public function remove(Product $product)
    {
        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }

    public function clear()
    {
        return redirect()->route('cart.index')->with('success', 'Panier vidé.');
    }
}
