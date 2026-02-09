<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('active', true)
            ->orderBy('name')
            ->get();

        return view('posts.index', compact('products'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        $validated['active'] = $request->boolean('active');
        Product::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Ça a enfin fonctionné ?????????');
    }

    public function show(Product $product)
    {
        return view('posts.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('posts.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        $validated['active'] = $request->boolean('active');
        $product->update($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Produit modifié avec succès !');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Produit supprimé avec succès !');
    }
}
