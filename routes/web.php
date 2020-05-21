<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/produits', "ProduitController@viewAll");

Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
