@extends('layouts.app')
@section('title', 'Paiement')
@section('content')
<section class="px-4 md:px-16 py-12 bg-white font-sans">
  <!-- ÉTAPES -->
 <div class="flex items-center gap-12 text-lg-custom font-bold mb-8" id="checkout-steps">
    <a href="{{ route('commande.livraison') }}" class="text-xl">←</a>
    <span class="step" data-step="address">Adresse</span>
    <span class="text-gray-400">></span>
    <span class="step" data-step="shipping">Livraison</span>
    <span class="text-gray-400">></span>
    <span class="step active-step" data-step="payment">Paiement</span>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Méthodes de paiement -->
    <div class="lg:col-span-2 space-y-6">
      <p class="text-sm-custom font-semibold">Méthode de paiement</p>

      <!-- Carte 1 -->
      <label class="flex justify-between items-center border rounded px-4 py-3 cursor-pointer hover:border-green_p">
        <div class="flex items-center gap-4">
          <input type="radio" name="paiement" checked class="accent-green_p" />
          <div class="flex items-center gap-2">
            <img src="{{ asset('assets/image/visa.png') }}" alt="Visa" class="w-6 h-4" />
            <span class="text-sm-custom font-semibold">•••• 6754</span>
            <span class="text-sm-custom text-gray-500">Expire 06/2021</span>
          </div>
        </div>
        <a href="#" class="text-sm-custom text-red-500 hover:underline">Supprimer</a>
      </label>

      <!-- Carte 2 -->
      <label class="flex justify-between items-center border rounded px-4 py-3 cursor-pointer hover:border-green_p">
        <div class="flex items-center gap-4">
          <input type="radio" name="paiement" class="accent-green_p" />
          <div class="flex items-center gap-2">
            <img src="{{ asset('assets/image/mastercard_paiement.png') }}" alt="MasterCard" class="w-6 h-4" />
            <span class="text-sm-custom font-semibold">•••• 5643</span>
            <span class="text-sm-custom text-gray-500">Expire 11/2025</span>
          </div>
        </div>
        <a href="#" class="text-sm-custom text-red-500 hover:underline">Supprimer</a>
      </label>

      <!-- Ajouter une carte -->
      <div>
        <a href="#" class="flex items-center gap-2 text-sm-custom text-green_p font-medium">
          <span class="text-xl">+</span> Ajouter une méthode de paiement
        </a>
      </div>
      <button class="mt-6 px-6 py-2 border border-red-300 bg-red-600 text-white rounded text-sm-custom hover:bg-red-400 hover:text-white transition">
        <a href="{{ route('produit') }}">Annuler</a>
      </button>
    </div>

    <!-- Récapitulatif commande -->
    <div class="border rounded p-6 shadow-sm">
      <h3 class="text-base-custom font-semibold mb-4">Récapitulatif de la commande</h3>
      <div class="space-y-8 text-sm-custom">
        <div class="flex justify-between">
          <span>Prix</span>
          <span>319,98 $</span>
        </div>
        <div class="flex justify-between">
          <span>Remise</span>
          <span>-31,90 $</span>
        </div>
        <div class="flex justify-between">
          <span>Livraison</span>
          <span class="text-green-600">Gratuite</span>
        </div>
        <div class="flex justify-between">
          <span>Coupon appliqué</span>
          <span>0,00 $</span>
        </div>
        <div class="border-t pt-2 flex justify-between font-bold">
          <span>Total</span>
          <span>288,08 $</span>
        </div>
        <div class="flex justify-between items-center mt-4">
          <span class="text-xs-custom text-gray-500">Livraison estimée le</span>
          <span class="text-xs-custom font-medium">01 Février 2023</span>
        </div>
        <div class="mt-4 flex items-center border rounded px-2 py-1">
          <input type="text" placeholder="Code promo" class="flex-1 outline-none text-sm-custom px-2" />
          <button class="text-gray-500 text-xl">🏷️</button>
        </div>
        <button onclick="showPaymentSuccessModal()" class="mt-4 w-full bg-green_p text-white py-2 rounded hover:bg-green-400 text-sm-custom">
          Passez votre commande et payer
        </button>
      </div>
    </div>
  </div>
</section>
<!-- Modal de confirmation -->
<div id="paymentSuccessModal" class="fixed inset-0 bg-black bg-opacity-40 z-100 flex items-center justify-center hidden">
  <div class="bg-white rounded-lg text-center px-6 py-8 w-[90%] max-w-md font-sans">
    <h1 class="text-2xl-custom font-bold mb-4">Trendify</h1>
    <img src="{{ asset('assets/image/icones/icon_paiement.png') }}" alt="Succès" class="w-20 h-20 mx-auto mb-4" />
    <p class="text-xl-custom font-bold mb-2">150,000 F CFA</p>
    <p class="text-base-custom mb-4">Paiement effectué avec succès</p>

    <button class="w-full bg-green-500 text-white rounded-full py-2 text-sm-custom mb-3 hover:bg-green-600">
      Suivre l’état de ma livraison
    </button>
    <button onclick="closePaymentModal()" class="w-full bg-rose-100 text-red-500 rounded-full py-2 text-sm-custom hover:bg-red-500 hover:text-white">
      Quitter
    </button>
    <p class="text-xs-custom text-gray-500 mt-4">Merci pour la confiance et au plaisir de vous revoir</p>
  </div>
</div>
@vite('resources/js/paiement.js')
@endsection
