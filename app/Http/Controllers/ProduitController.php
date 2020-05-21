<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller{

    public function viewAll(Request $request)
    {
        $sort = $request->has('sort') ? $request->input('sort') : "id";
        $produits = Produit::orderBy($sort)->simplePaginate(10);
        return view('backend.produits',['produits'=>$produits,'sort'=>$sort]);
    }
    
}
