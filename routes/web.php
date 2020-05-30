<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/produits', "ProduitController@viewAll");
Route::get('/admin/ajouter-produit', "ProduitController@viewAdd");
Route::post('/admin/ajouter-produit', "ProduitController@addProduct");

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
