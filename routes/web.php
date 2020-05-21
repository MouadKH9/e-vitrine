<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/produits', function () {
    return view('backend.produits');
});

Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
