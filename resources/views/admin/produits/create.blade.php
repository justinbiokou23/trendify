@extends('layouts.app')

@section('title', 'Ajouter un produit')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white rounded shadow p-8">
    <h2 class="text-2xl font-bold mb-6">Ajouter un produit</h2>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="nom" class="block mb-1">Nom du produit</label>
            <input type="text" name="nom" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="description" class="block mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div>
            <label for="prix" class="block mb-1">Prix</label>
            <input type="number" name="prix" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="categorie_id" class="block mb-1">Catégorie existante</label>
            <select name="categorie_id" class="w-full border rounded px-3 py-2">
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nouvelle_categorie" class="block mb-1">Ou nouvelle catégorie</label>
            <input type="text" name="nouvelle_categorie" class="w-full border rounded px-3 py-2" placeholder="Saisir une nouvelle catégorie (optionnel)">
        </div>
    

        <div>
            <label for="stock" class="block mb-1">Stock</label>
            <input type="number" name="stock" class="w-full border rounded px-3 py-2" min="0" required>
        </div>

        <div>
            <label for="image" class="block mb-1">Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2" required>
            
            <input type="hidden" name="promo_semaine" value="0">
            <label>
                <input type="checkbox" name="promo_semaine" value="1" {{ old('promo_semaine', $produit->promo_semaine) ? 'checked' : '' }}>
                Promo de la semaine
            </label>
        </div>



        <button type="submit" class="bg-primary text-white px-6 py-2 rounded">Ajouter</button>
    </form>
</div>
@endsection
