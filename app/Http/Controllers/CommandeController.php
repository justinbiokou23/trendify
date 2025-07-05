<?php

// app/Http/Controllers/CommandeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // Etape 1 : Affichage de la page d'adresse
    public function adresse(Request $request)
    {
        // Si tu utilises les adresses de l’utilisateur connecté :
        $adresses = []; // à remplacer par la logique pour récupérer les adresses du user

        // Les totaux, tu peux les passer comme pour le panier si besoin
        $panier = session('panier', []);
        $total = collect($panier)->sum(fn($item) => $item['prix'] * $item['quantite']);
        $remise = $total > 150 ? $total * 0.10 : 0;
        $totalFinal = $total - $remise;

        return view('commande.adresse', compact('adresses', 'panier', 'total', 'remise', 'totalFinal'));
    }

    
}
