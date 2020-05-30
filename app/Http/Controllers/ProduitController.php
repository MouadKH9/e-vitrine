<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class ProduitController extends Controller
{

    public function viewAll(Request $request)
    {
        $sort = $request->has('sort') ? $request->input('sort') : "id";
        $produits = Produit::orderBy($sort)->simplePaginate(10);
        return view('backend.produits', ['produits' => $produits, 'sort' => $sort]);
    }

    public function viewAdd(Request $request)
    {
        return view('backend.ajouter-produit');
    }

    public function addProduct(Request $request)
    {
        $prod = new Produit();
        $prod->name = $request->input('name');
        $prod->description = $request->input('description');
        $prod->price = $request->input('price');
        $prod->category_id = 1;
        $prod->user_id = Auth::user()->id;

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

            $file = $image->storeAs($folder, $name . '.' . $image->getClientOriginalExtension(), "public");

            $prod->image = $name . "." .
                $image->getClientOriginalExtension();
        }
        $prod->save();

        return redirect('/admin/produits');
    }
}
