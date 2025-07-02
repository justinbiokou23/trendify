<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AccueilController extends Controller
{
  public function index()
{
    // BONNES AFFAIRES (ex: promos ou nouveautés)
    $bonnesAffaires = Product::latest()->take(3)->get();

    // NOUVEAUX ARRIVAGES (ou flag spécifique dans la table products)
    $nouveauxArrivages = Product::orderBy('created_at', 'desc')->take(6)->get();

    // MATÉRIEL INFORMATIQUE
    $materielInformatique = Product::whereHas('categorie', function($q){
        $q->where('nom', 'like', '%matériel%');
    })->take(6)->get();

    // ORDINATEURS
    $ordinateurs = Product::whereHas('categorie', function($q){
        $q->where('nom', 'like', '%ordinateur%');
    })->take(6)->get();

    // SMARTPHONES
    $smartphones = Product::whereHas('categorie', function($q){
        $q->where('nom', 'like', '%smartphone%');
    })->take(6)->get();

    // PROMO DE LA SEMAINE (flag promo_semaine = 1)
    $promos = Product::where('promo_semaine', 1)->latest()->take(3)->get();

    return view('index', compact(
        'bonnesAffaires',
        'nouveauxArrivages',
        'materielInformatique',
        'ordinateurs',
        'smartphones',
        'promos'
    ));
}

}
