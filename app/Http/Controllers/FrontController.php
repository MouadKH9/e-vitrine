<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $topProducts = Produit::orderBy("views", 'desc')->limit(4)->get();
        return view('frontend.home', ["popProduits" => $topProducts]);
    }
}
