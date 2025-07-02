<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // ou Produit selon ton modèle
use App\Models\Category; // on suppose que tu as une table categories
use Illuminate\Support\Facades\Storage;


class ProduitController extends Controller
{
    public function index()
    {
        // On récupère tous les produits (avec la catégorie liée)
        $produits = \App\Models\Product::with('categorie')->latest()->get();

        // On renvoie vers la vue liste
        return view('admin.produits.index', compact('produits'));
    }


     public function create(Product $produit)
    {
        $categories = Category::all();
        return view('admin.produits.create', compact('produit','categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|image',
            'categorie_id' => 'nullable|exists:categories,id',
            'nouvelle_categorie' => 'nullable|string|max:255',
            // PROMO_SEMAINE PAS NÉCESSAIRE À VALIDER (c'est envoyé en hidden ou checkbox)
        ]);

        // Gestion de la catégorie
        if ($request->filled('nouvelle_categorie')) {
            $categorie = Category::firstOrCreate(['nom' => $request->nouvelle_categorie]);
            $categorie_id = $categorie->id;
        } else {
            $categorie_id = $request->categorie_id;
        }
        if (!$categorie_id) {
            return back()->withErrors(['categorie_id' => 'La catégorie est obligatoire.'])->withInput();
        }

        // Upload image
        $path = $request->file('image')->store('produits', 'public');

        // On prend tous les champs
        $data = $request->all();
        $data['image'] = $path;
        $data['categorie_id'] = $categorie_id;
        $data['promo_semaine'] = $request->input('promo_semaine', 0); // CORRECT

        Product::create($data);


        return redirect()->route('admin.produits.index')->with('success', 'Produit ajouté avec succès !');
    }

     // Page édition
    public function edit(Product $produit)
    {
        $categories = Category::all();
        return view('admin.produits.edit', compact('produit', 'categories'));
    }

    // Mise à jour
  public function update(Request $request, Product $produit)
{
    $request->validate([
        'nom' => 'required',
        'description' => 'nullable',
        'prix' => 'required|numeric',
        'categorie_id' => 'required|exists:categories,id',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image',
    ]);

    $produit->nom = $request->nom;
    $produit->description = $request->description;
    $produit->prix = $request->prix;
    $produit->categorie_id = $request->categorie_id;
    $produit->stock = $request->stock;
    $produit->promo_semaine = $request->input('promo_semaine', 0); // Prend 0 ou 1 envoyé

    // Image : si on upload une nouvelle
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si besoin
        if ($produit->image && \storage_path()::disk('public')->exists($produit->image)) {
            \storage_path()::disk('public')->delete($produit->image);
        }
        $produit->image = $request->file('image')->store('produits', 'public');
    }

    $produit->save();

    return redirect()->route('admin.produits.index')->with('success', 'Produit modifié avec succès.');
}

    // Suppression
    public function destroy($id)
    {
        $produit = Product::findOrFail($id);

        // On supprime l'image s'il y en a une
        if ($produit->image) {
            Storage::delete($produit->image); // Ici on utilise bien la façade Storage
        }

        $produit->delete();

        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé avec succès.');
    }


}
