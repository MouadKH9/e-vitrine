<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('produits', "ProduitController@viewAll");
    Route::get('ajouter-produit', "ProduitController@viewAdd");
    Route::get('modifier-produit/{id}', "ProduitController@viewEdit");
    Route::post('ajouter-produit', "ProduitController@addProduct");
    Route::post('modifier-produit/{id}', "ProduitController@editProduct");
    Route::get('supprimer-produit/{id}', "ProduitController@deleteProduct");

    Route::get('categories', "CategoryController@viewAll");
    Route::post('ajouter-category', "CategoryController@addCategory");
    Route::get('supprimer-category/{id}', "CategoryController@deleteCategory");

    Route::get('admins', "AdminController@viewAll");
    Route::post('ajouter-admin', "AdminController@addAdmin");
    Route::get('supprimer-admin/{id}', "AdminController@deleteAdmin");
});




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
