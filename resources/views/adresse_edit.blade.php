@extends('layouts.app')
@section('title', 'Modifier adresse')
@section('content')
<section class="px-4 md:px-16 py-12 bg-white font-sans">
  <h2 class="text-xl font-bold mb-8">Modifier l’adresse</h2>
  <form action="{{ route('adresse.update', $adresse->id) }}" method="POST" class="max-w-lg space-y-6">
    @csrf
    @method('PUT')
    <div>
      <label class="block font-semibold mb-1">Nom du destinataire</label>
      <input type="text" name="nom" value="{{ old('nom', $adresse->nom) }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
      <label class="block font-semibold mb-1">Type</label>
      <select name="type" class="w-full border rounded px-3 py-2" required>
        <option value="DOMICILE" {{ $adresse->type == 'DOMICILE' ? 'selected' : '' }}>Domicile</option>
        <option value="BUREAU" {{ $adresse->type == 'BUREAU' ? 'selected' : '' }}>Bureau</option>
      </select>
    </div>
    <div>
      <label class="block font-semibold mb-1">Adresse complète</label>
      <input type="text" name="adresse" value="{{ old('adresse', $adresse->adresse) }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
      <label class="block font-semibold mb-1">Contact</label>
      <input type="text" name="contact" value="{{ old('contact', $adresse->contact) }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Enregistrer</button>
    <a href="{{ route('adresse') }}" class="ml-4 text-gray-500 underline">Annuler</a>
  </form>
</section>
@endsection
