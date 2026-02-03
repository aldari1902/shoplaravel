<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        return "Affichage du produit $id";
    }

    public function index()
    {
        $products = [
            1 => ['name' => 'Lego Venator',
                'id' => 75367,
                'availability' => true,
                'price' => 649.99],
            2 => ['name' => 'Lego Barad-dûr',
                'id' => 10333,
                'availability' => false,
                'price' => 459.99],
            3 => ['name' => 'Lego Millenium Falcon',
                'id' => 75192,
                'availability' => true,
                'price' => 849.99],
            4 => ['name' => 'Lego Microfighter Rex',
                'id' => 75391,
                'availability' => true,
                'price' => 12.99],
            5 => ['name' => 'Lego Fondcombe',
                'id' => 10316,
                'availability' => true,
                'price' => 499.99]
        ];


        return view('products.index', compact('products'));
    }
}

