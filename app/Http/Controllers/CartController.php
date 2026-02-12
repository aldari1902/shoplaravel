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

    public function update($id, Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = (int)$request->input('quantity');

            if ($quantity < 1) {
                $quantity = 1;
            }

            $cart[$id]['quantity'] = $quantity;

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Panier mis à jour');
    }


    public function remove(Request $product)
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
