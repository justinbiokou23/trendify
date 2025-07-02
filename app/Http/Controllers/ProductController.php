<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les produits (tu peux ajouter ->with('categorie') si besoin)
        $produits = Product::latest()->get();
        return view('produit', compact('produits'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
{
    // On récupère le produit (avec la catégorie, si tu veux)
    $produit = \App\Models\Product::with('categorie')->findOrFail($id);

    // Suggestions : 4 produits au hasard (sauf celui affiché)
    $suggestions = \App\Models\Product::where('id', '!=', $id)->inRandomOrder()->take(4)->get();

    // Tu peux aussi charger d’autres infos (avis, FAQ, etc.)
    return view('produit_details', compact('produit', 'suggestions'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
