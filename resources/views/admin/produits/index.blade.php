@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')
<div class="max-w-5xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6">Liste des produits</h2>
    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    <div class="mb-6 text-right">
        <a href="{{ route('admin.produits.create') }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-400">Ajouter un produit</a>
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full text-sm-custom">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-3">Image</th>
                    <th class="py-2 px-3">Nom</th>
                    <th class="py-2 px-3">Catégorie</th>
                    <th class="py-2 px-3">Prix</th>
                    <th class="py-2 px-3">Stock</th>
                    <th class="py-2 px-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produits as $produit)
                    <tr class="border-b">
                        <td class="py-2 px-3">
                            <img src="{{ asset('storage/'.$produit->image) }}" alt="Image" class="w-16 h-16 object-contain rounded" />
                        </td>
                        <td class="py-2 px-3 font-semibold">{{ $produit->nom }}</td>
                        <td class="py-2 px-3">{{ $produit->categorie->nom ?? '-' }}</td>
                        <td class="py-2 px-3">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                        <td class="py-2 px-3">{{ $produit->stock }}</td>
                        <td class="py-2 px-3 flex gap-2">
                            <a href="{{ route('admin.produits.edit', $produit->id) }}"
                            class="text-blue-500 hover:underline">Modifier</a>
                            <form action="{{ route('admin.produits.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr><td colspan="6" class="py-6 text-center text-gray-500">Aucun produit pour l’instant.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
