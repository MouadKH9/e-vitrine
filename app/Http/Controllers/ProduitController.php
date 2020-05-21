<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller{

    public function viewAll(Request $request)
    {
        $produits = Produit::simplePaginate(10);
        return view('backend.produits',['produits'=>$produits]);
    }
    
}
