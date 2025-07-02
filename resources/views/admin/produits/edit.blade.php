@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white rounded shadow p-8">
    <h2 class="text-2xl font-bold mb-6">Modifier le produit</h2>
    @if ($errors->any())
        <div class="mb-4 text-red-500 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nom" class="block mb-1">Nom du produit</label>
            <input type="text" name="nom" value="{{ old('nom', $produit->nom) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="description" class="block mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $produit->description) }}</textarea>
        </div>

        <div>
            <label for="prix" class="block mb-1">Prix</label>
            <input type="number" name="prix" value="{{ old('prix', $produit->prix) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="categorie_id" class="block mb-1">Catégorie</label>
            <select name="categorie_id" class="w-full border rounded px-3 py-2" required>
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $produit->categorie_id == $cat->id ? 'selected' : '' }}>{{ $cat->nom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="stock" class="block mb-1">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $produit->stock) }}" class="w-full border rounded px-3 py-2" min="0" required>
        </div>

        <div>
            <label for="image" class="block mb-1">Image (laisser vide pour ne pas changer)</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
            @if($produit->image)
                <img src="{{ asset('storage/'.$produit->image) }}" alt="Image" class="w-20 h-20 object-contain mt-2 rounded">
            @endif
        </div>

        <div>
            <input type="hidden" name="promo_semaine" value="0">
            <label>
                <input type="checkbox" name="promo_semaine" value="1" {{ old('promo_semaine', $produit->promo_semaine) ? 'checked' : '' }}>
                Promo de la semaine
            </label>
        </div>

        <button type="submit" class="bg-primary text-white px-6 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection
