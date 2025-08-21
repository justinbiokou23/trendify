@extends('layouts.app')

@section('title', 'Ajouter un produit')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white rounded shadow p-8">
    <h2 class="text-2xl font-bold mb-6">Ajouter un produit</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Nom du produit</label>
            <input type="text" name="nom" value="{{ old('nom') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Prix</label>
            <input type="number" step="0.01" name="prix" value="{{ old('prix') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Stock</label>
            <input type="number" min="0" name="stock" value="{{ old('stock') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Catégorie existante</label>
            <select name="categorie_id" class="w-full border rounded px-3 py-2">
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(old('categorie_id')==$cat->id)>{{ $cat->nom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Ou nouvelle catégorie</label>
            <input type="text" name="nouvelle_categorie" value="{{ old('nouvelle_categorie') }}" class="w-full border rounded px-3 py-2" placeholder="Saisir une nouvelle catégorie (optionnel)">
        </div>

        <div>
            <label class="block mb-1">Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex items-center gap-2">
            <input type="hidden" name="promo_semaine" value="0">
            <input type="checkbox" name="promo_semaine" value="1" @checked(old('promo_semaine'))>
            <span>Promo de la semaine</span>
        </div>

        <button type="submit" class="bg-primary text-white px-6 py-2 rounded">Ajouter</button>
    </form>
</div>
@endsection
