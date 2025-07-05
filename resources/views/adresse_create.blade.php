@extends('layouts.app')
@section('title', 'Ajouter une adresse')
@section('content')
<div class="max-w-lg mx-auto mt-12 bg-white rounded shadow p-8">
  <h2 class="text-2xl font-bold mb-6">Ajouter une nouvelle adresse</h2>
  @if($errors->any())
    <div class="mb-4 text-red-600">
      @foreach($errors->all() as $e)
        <div>{{ $e }}</div>
      @endforeach
    </div>
  @endif
  <form action="{{ route('adresse.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="block mb-1">Type d'adresse</label>
      <select name="type" class="w-full border rounded px-3 py-2" required>
        <option value="domicile">Domicile</option>
        <option value="bureau">Bureau</option>
        <option value="autre">Autre</option>
      </select>
    </div>
    <div>
      <label class="block mb-1">Nom du destinataire</label>
      <input type="text" name="nom" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
      <label class="block mb-1">Adresse complète</label>
      <input type="text" name="adresse" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
      <label class="block mb-1">Numéro de contact</label>
      <input type="text" name="contact" class="w-full border rounded px-3 py-2" required>
    </div>
    <div class="text-right">
      <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">Ajouter</button>
      <a href="{{ route('adresse') }}" class="ml-3 text-gray-500 hover:underline">Annuler</a>
    </div>
  </form>
</div>
@endsection
