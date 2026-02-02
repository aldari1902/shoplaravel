<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $url = route('products.show', ['id' => 1]);
        return redirect($url);
    }

    public function about()
    {
        return 'À propos de nous';
    }

    public function contact()
    {
        return 'Contactez-nous';
    }
}

