<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
{

    return view('admin.commandes');
}
// app/Http/Controllers/CommandeController.php

public function showLivraison()
{
    $adresses = auth()->user()->adresses; // Ou Adresse::where('user_id', auth()->id())->get();
    $panier_total = session('panier_total', 0);
    $panier_remise = session('panier_remise', 0);
    $panier_total_final = session('panier_total_final', 0);

    return view('livraison', compact('adresses', 'panier_total', 'panier_remise', 'panier_total_final'));
}

public function livraison(Request $request)
{
    $data = $request->validate([
        'adresse_id' => 'required|exists:adresses,id',
        'livraison' => 'required|in:gratuite,prioritaire,planifiee',
        'date_planifiee' => 'nullable|date|after:today'
    ]);
    // Stocke le choix pour l’étape suivante
    session([
        'commande_adresse_id' => $data['adresse_id'],
        'commande_livraison' => $data['livraison'],
        'commande_date_planifiee' => $data['livraison'] == 'planifiee' ? $data['date_planifiee'] : null,
    ]);
    // Redirige vers l’étape suivante (paiement)
    return redirect()->route('paiement.show');
}

}
