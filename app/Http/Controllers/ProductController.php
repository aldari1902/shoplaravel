<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request): Factory|View
    {
        $query = Product::where('active', true);

        if ($request->has('show_adult') && $request->show_adult == 1) {
            $query->where('category', 'Adulte');
        }
        if ($request->has('show_enfant') && $request->show_enfant == 1) {
            $query->where('category', 'Enfant');
        }

        $products = $query->orderBy('name')->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        $validated['active'] = $request->boolean('active');
        Product::create($validated);
        return redirect()->route('products.index')
            ->with('success', 'Ça a enfin fonctionné ?????????');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        $validated['active'] = $request->boolean('active');
        $product->update($validated);
        return redirect()->route('products.index')
            ->with('success', 'Produit modifié avec succès !');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Produit supprimé avec succès !');
    }


}
