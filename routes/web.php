<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/produits', "ProduitController@viewAll");
Route::get('/admin/ajouter-produit', "ProduitController@viewAdd");
Route::get('/admin/modifier-produit/{id}', "ProduitController@viewEdit");
Route::post('/admin/ajouter-produit', "ProduitController@addProduct");
Route::post('/admin/modifier-produit/{id}', "ProduitController@editProduct");
Route::get('/admin/supprimer-produit/{id}', "ProduitController@deleteProduct");

Route::get('storage/{filename}', function ($filename) {
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
