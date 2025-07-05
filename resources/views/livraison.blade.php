@extends('layouts.app')
@section('title', 'Adresse')
@section('content')
<section class="px-4 md:px-16 py-12 bg-white font-sans">
  <!-- ÉTAPES -->
  <div class="flex items-center gap-12 text-lg-custom font-bold mb-8" id="checkout-steps">
    <a href="adresse.html" class="text-xl">←</a>
    <span class="step" data-step="address">Adresse</span>
    <span class="text-gray-400">></span>
    <span class="step active-step" data-step="shipping">Livraison</span>
    <span class="text-gray-400">></span>
    <span class="step" data-step="payment">Paiement</span>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Méthodes de livraison -->
    <div class="lg:col-span-2 space-y-6">
      <p class="text-sm-custom font-semibold">Méthode de livraison</p>

      <label class="flex justify-between items-center border rounded px-4 py-3 cursor-pointer hover:border-green_p">
        <div class="flex items-center gap-4">
          <input type="radio" name="livraison" checked class="accent-green_p" />
          <div>
            <p class="text-sm-custom font-bold text-black">Gratuite <span class="text-gray-500 font-normal">Livraison standard</span></p>
          </div>
        </div>
        <span class="text-sm-custom font-semibold">01 Fév, 2023</span>
      </label>

      <label class="flex justify-between items-center border rounded px-4 py-3 cursor-pointer hover:border-green_p">
        <div class="flex items-center gap-4">
          <input type="radio" name="livraison" class="accent-green_p" />
          <div>
            <p class="text-sm-custom font-bold text-black">8,50 $ <span class="text-gray-500 font-normal">Livraison prioritaire</span></p>
          </div>
        </div>
        <span class="text-sm-custom font-semibold">28 Jan, 2023</span>
      </label>

      <label class="flex justify-between items-center border rounded px-4 py-3 cursor-pointer hover:border-green_p">
        <div class="flex items-center gap-4">
          <input type="radio" name="livraison" class="accent-green_p" />
          <div>
            <p class="text-sm-custom font-bold text-black">Planifier <span class="text-gray-500 font-normal">Choisissez une date qui vous convient</span></p>
          </div>
        </div>
        <select class="text-sm-custom border rounded px-2 py-1">
          <option disabled selected>Sélectionnez une date</option>
          <option>30 Jan, 2023</option>
          <option>02 Fév, 2023</option>
        </select>
      </label>
      <button class="mt-6 px-6 py-2 border border-red-300 bg-red-600 text-white rounded text-sm-custom hover:bg-red-400 hover:text-white transition"><a href="{{ route('adresse') }}">Annuler</a></button>
    </div>

    <!-- Récapitulatif commande -->
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
      <form action="{{ route('paiement') }}" method="GET">
          <button type="submit" class="mt-4 w-full bg-green_p text-white py-2 rounded hover:bg-green-400 text-sm-custom">
             Passez votre commande et payer
          </button>
      </form>
      </div>
    </div>
  </div>
</section>
@vite('resources/js/adresse.js')
@endsection








