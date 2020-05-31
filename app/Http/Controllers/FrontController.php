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
        $type = $request->has('type') ? $request->input('type') : "desc";
        $produits = Produit::orderBy($sort, $type)->simplePaginate(8);
        return view('frontend.home', ["produits" => $produits, "popProduits" => $topProducts, "sort" => $sort]);
    }

    public function produit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('frontend.produit', ["produit" => $produit]);
    }
}
