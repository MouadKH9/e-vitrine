<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(Request $request)
    {
        $topProducts = Produit::orderBy("views", 'desc')->limit(4)->get();
        $sort = $request->has('sort') ? $request->input('sort') : "id";
        $produits = Produit::orderBy($sort, 'desc')->simplePaginate(8);
        return view('frontend.home', ["produits" => $produits, "popProduits" => $topProducts, "sort" => $sort]);
    }
}
