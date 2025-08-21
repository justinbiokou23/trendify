<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Product::with('categorie')->latest()->get();
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        $categories = Category::orderBy('nom')->get();
        return view('admin.produits.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'                => 'required|string|max:255',
            'description'        => 'nullable|string',
            'prix'               => 'required|numeric|min:0',
            'stock'              => 'required|integer|min:0',
            'image'              => 'required|image|max:4096',
            'categorie_id'       => 'nullable|exists:categories,id',
            'nouvelle_categorie' => 'nullable|string|max:255',
            'promo_semaine'      => 'nullable|boolean',
        ]);

        // 1) Catégorie
        if ($request->filled('nouvelle_categorie')) {
            $categorie = Category::firstOrCreate(['nom' => trim($request->nouvelle_categorie)]);
            $categorie_id = $categorie->id;
        } else {
            $categorie_id = $request->categorie_id;
        }
        if (!$categorie_id) {
            return back()
                ->withErrors(['categorie_id' => 'Veuillez sélectionner une catégorie ou en créer une.'])
                ->withInput();
        }

        // 2) Upload image
        $path = $request->file('image')->store('produits', 'public');

        // 3) Construction des données (on évite $request->all())
        $data = [
            'nom'            => $request->nom,
            'description'    => $request->description,
            'prix'           => $request->prix,
            'stock'          => $request->stock,
            'image'          => $path,
            'categorie_id'   => $categorie_id,
            'promo_semaine'  => (bool) $request->input('promo_semaine', 0),
        ];

        Product::create($data);

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit ajouté avec succès !');
    }

    public function edit(Product $produit)
    {
        $categories = Category::orderBy('nom')->get();
        return view('admin.produits.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, Product $produit)
    {
        $request->validate([
            'nom'           => 'required|string|max:255',
            'description'   => 'nullable|string',
            'prix'          => 'required|numeric|min:0',
            'categorie_id'  => 'required|exists:categories,id',
            'stock'         => 'required|integer|min:0',
            'image'         => 'nullable|image|max:4096',
            'promo_semaine' => 'nullable|boolean',
        ]);

        $produit->nom          = $request->nom;
        $produit->description  = $request->description;
        $produit->prix         = $request->prix;
        $produit->categorie_id = $request->categorie_id;
        $produit->stock        = $request->stock;
        $produit->promo_semaine = (bool) $request->input('promo_semaine', 0);

        if ($request->hasFile('image')) {
            // Supprimer l’ancienne image si elle existe
            if ($produit->image && Storage::disk('public')->exists($produit->image)) {
                Storage::disk('public')->delete($produit->image);
            }
            $produit->image = $request->file('image')->store('produits', 'public');
        }

        $produit->save();

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit modifié avec succès.');
    }

    public function destroy($id)
    {
        $produit = Product::findOrFail($id);

        if ($produit->image && Storage::disk('public')->exists($produit->image)) {
            Storage::disk('public')->delete($produit->image);
        }

        $produit->delete();

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}
