<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create'); // Retourne la vue create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        Chirp::create([
            'message' => $validated['message'],
        ]);
        return redirect('/')->with('success', 'Chirp Created good job!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//
//class ProductController extends Controller
//{
//    public function show($id)
//    {
//        return "Affichage du produit $id";
//    }
//
//    public function index()
//    {
//        $products = [
//            1 => ['name' => 'Lego Venator',
//                'id' => 75367,
//                'availability' => true,
//                'price' => 649.99],
//            2 => ['name' => 'Lego Barad-dûr',
//                'id' => 10333,
//                'availability' => false,
//                'price' => 459.99],
//            3 => ['name' => 'Lego Millenium Falcon',
//                'id' => 75192,
//                'availability' => true,
//                'price' => 849.99],
//            4 => ['name' => 'Lego Microfighter Rex',
//                'id' => 75391,
//                'availability' => true,
//                'price' => 12.99],
//            5 => ['name' => 'Lego Fondcombe',
//                'id' => 10316,
//                'availability' => true,
//                'price' => 499.99]
//        ];
//
//
//        return view('products.index', compact('products'));
//    }
//}


