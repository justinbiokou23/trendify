@extends('layouts.app')
@section('title', 'Adresse')
@section('content')
<section class="px-4 md:px-16 py-12 bg-white font-sans">
  <!-- ÉTAPES -->
  <div class="flex items-center gap-12 text-lg-custom font-bold mb-8" id="checkout-steps">
    <a href="{{ route('panier') }}" class="text-xl">←</a>
    <span class="step active-step" data-step="address">Adresse</span>
    <span class="text-gray-400">></span>
    <span class="step" data-step="shipping">Livraison</span>
    <span class="text-gray-400">></span>
    <span class="step" data-step="payment">Paiement</span>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Adresses dynamiques -->
    <div class="lg:col-span-2 space-y-12" id="address-list">
      @forelse($adresses as $adresse)
        <label class="flex items-start gap-4 cursor-pointer address-option">
          <input type="radio" name="adresse_id" value="{{ $adresse->id }}" class="mt-1 accent-green_p" {{ $loop->first ? 'checked' : '' }}>
          <div class="flex-1 border rounded p-4">
            <div class="flex items-center justify-between">
              <p class="font-semibold">
                {{ $adresse->nom }}
                <span class="ml-2 bg-gray-100 text-xs px-2 py-1 rounded-full">{{ strtoupper($adresse->type) }}</span>
              </p>
              <div class="text-sm-custom space-x-2">
                {{-- (Bonus) tu peux gérer modifier/supprimer --}}
                <a href="{{ route('adresse.edit', $adresse->id) }}" class="text-black hover:underline">Modifier</a>
                <span class="text-gray-400">|</span>
                <form action="{{ route('adresse.supprimer', $adresse) }}" method="POST" style="display:inline">
                  @csrf @method('DELETE')
                  <button class="text-red-500 hover:underline" type="submit">Supprimer</button>
                </form>
              </div>
            </div>
            <p class="text-sm-custom text-gray-600 mt-1">{{ $adresse->adresse }}</p>
            <p class="text-sm-custom text-gray-700 font-semibold mt-1">Contact : {{ $adresse->contact }}</p>
          </div>
        </label>
      @empty
        <div class="p-8 text-center text-gray-500 border rounded">Aucune adresse enregistrée.</div>
      @endforelse

      <div>
        <a href="{{ route('adresse.create') }}" class="flex items-center gap-2 text-sm-custom text-green_p font-medium">
          <span class="text-xl">+</span> Ajouter une nouvelle adresse
        </a>
      </div>
      <button class="mt-6 px-6 py-2 border border-red-300 bg-red-600 text-white rounded text-sm-custom hover:bg-red-400 hover:text-white transition">
        <a href="{{ route('produit') }}">Annuler</a>
      </button>
    </div>

    <!-- Récapitulatif commande (à adapter dynamiquement) -->
    <div class="border rounded p-6 shadow-sm">
      <h3 class="text-base-custom font-semibold mb-4">Récapitulatif de la commande</h3>
      {{-- Mets ici tes infos dynamiques du panier --}}
      <div class="space-y-8 text-sm-custom">
        <div class="flex justify-between">
          <span>Prix</span>
          <span>{{ session('panier_total', 0) }} FCFA</span>
        </div>
        <div class="flex justify-between">
          <span>Remise</span>
          <span>-{{ session('panier_remise', 0) }} FCFA</span>
        </div>
        <div class="flex justify-between">
          <span>Livraison</span>
          <span class="text-green-600">Gratuite</span>
        </div>
        <div class="border-t pt-2 flex justify-between font-bold">
          <span>Total</span>
          <span>{{ session('panier_total_final', 0) }} FCFA</span>
        </div>
<form action="{{ route('commande.livraison') }}" method="GET">
    <button type="submit" class="mt-4 w-full bg-green_p text-white py-2 rounded hover:bg-green-400 text-sm-custom">
        Continuer vers livraison
    </button>
</form>
      </div>
    </div>
  </div>
</section>
@vite('resources/js/adresse.js')
@endsection
