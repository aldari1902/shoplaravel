<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function add($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }
        session(['cart' => $cart]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Ajouté au panier.');
    }

    public function update(Product $product, Request $request)
    {
        $quantity = $request->input('quantity', 1);
        $cart = session('cart', []);

        if (session()->has('cart') && isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $quantity;

            // 1. Mettre à jour le panier dans la session
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Panier mis à jour');
    }

    public function remove(Product $product)
    {
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);

            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }

    public function clear()
    {
        session()->flush();
        return redirect()->route('cart.index')->with('success', 'Panier vidé.');
    }
}
