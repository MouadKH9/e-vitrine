<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/produits', "ProduitController@viewAll");
Route::get('/admin/ajouter-produit', "ProduitController@viewAdd");

Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
