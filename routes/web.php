<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/hello', function () {
//    return 'Hello Laravel';
//});
//
//
////--------------------------Exercice 2-----------------------------------
//use App\Http\Controllers\PageController;
//
//Route::get('/', [PageController::class, 'home']);
//Route::get('/about', [PageController::class, 'about']);
//Route::get('/contact', [PageController::class, 'contact']);
//
////------------------------------Exercice 3-------------------------------
//Route::get('/products/{id}', function ($id) {
//    return "Produit numéro : $id";
//});
//
//Route::get('/category/{name?}', function ($name = 'Toutes') {
//    return "Catégorie : $name";
//});
//Route::get('/products/{category}/{id}', function ($category, $id) {
//    return "Catégorie: $category, Produit: $id";
//});
//
//Route::get('/products/{id}', [ProductController::class, 'show']);
//
////-------------------------------Exercice 4------------------------------
//Route::get('/', [PageController::class, 'home'])
//    ->name('home');
//
//Route::get('/about', [PageController::class, 'about'])
//    ->name('about');
//
//Route::get('/products/{id}', [ProductController::class, 'show'])
//    ->name('products.show');

//JOUR 2//

//-------------------------------Exercice 3------------------------------

//Route::get('/index', [ProductController::class, 'index'])
//    ->name('products.index');

//-------------------------------Exercice 4------------------------------

Route::view('/', 'home')
    ->name('home');

Route::view('/about', 'about')
    ->name('about');

Route::view('/contact', 'contact')
    ->name('contact');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::resource('posts', ProductController::class);
