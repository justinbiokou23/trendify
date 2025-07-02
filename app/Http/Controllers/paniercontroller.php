<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PanierController extends Controller
{
    // Affiche le panier
    public function index()
    {
        $panier = session('panier', []);
        $total = collect($panier)->sum(fn($item) => $item['prix'] * $item['quantite']);
        $remise = $total > 150 ? $total * 0.10 : 0;
        $totalFinal = $total - $remise;

        return view('panier', compact('panier', 'total', 'remise', 'totalFinal'));
    }

    // Ajouter au panier
   public function ajouter(Request $request, $id)
{
    $produit = Product::findOrFail($id);
    $panier = session()->get('panier', []);
    if (isset($panier[$id])) {
        $panier[$id]['quantite'] += 1;
    } else {
        $panier[$id] = [
            'nom' => $produit->nom,
            'image' => $produit->image,
            'prix' => $produit->prix,
            'quantite' => 1,
        ];
    }
    session(['panier' => $panier]);
    return back()->with('success', 'Produit ajouté au panier !');
}


    // Modifier quantité
    public function modifier(Request $request, $id)
    {
        $panier = session()->get('panier', []);
        if (isset($panier[$id])) {
            $panier[$id]['quantite'] = max(1, intval($request->quantite));
        }
        session(['panier' => $panier]);
        return back();
    }

    // Supprimer un article
    public function supprimer($id)
    {
        $panier = session()->get('panier', []);
        unset($panier[$id]);
        session(['panier' => $panier]);
        return back();
    }
}

