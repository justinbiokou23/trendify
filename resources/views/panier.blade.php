

@extends('layouts.app')
@section('title', 'Panier')
@section('content')
<section class="px-4 md:px-16 py-12 bg-white font-sans">
  <!-- Titre + flèche retour -->
  <div class="flex items-center gap-3 mb-8">
    <a href="{{ url()->previous() }}" class="text-xl">←</a>
    <h2 class="text-2xl-custom font-bold">Panier 
      <span class="text-gray-400 text-base">{{ count($panier ?? []) }} articles</span>
    </h2>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
    <!-- Liste des produits -->
    <div class="lg:col-span-2 space-y-16">
      @forelse ($panier as $id => $item)
        <div class="flex flex-col sm:flex-row items-start justify-between border-b pb-4 gap-4">
          <div class="flex gap-4">
            <img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['nom'] }}" class="w-24 h-24 object-contain" />
            <div>
              <p class="text-base-custom font-semibold">{{ $item['nom'] }}</p>
              <div class="mt-2 flex items-center gap-3">
                <form action="{{ route('panier.modifier', $id) }}" method="POST" class="inline">
                  @csrf
                  <div class="flex items-center border rounded">
                    <button type="submit" name="quantite" value="{{ $item['quantite'] - 1 }}" class="px-3 py-1" {{ $item['quantite'] <= 1 ? 'disabled' : '' }}>−</button>
                    <span class="px-4">{{ $item['quantite'] }}</span>
                    <button type="submit" name="quantite" value="{{ $item['quantite'] + 1 }}" class="px-3 py-1">+</button>
                  </div>
                </form>
                <form action="{{ route('panier.supprimer', $id) }}" method="POST" class="inline">
                  @csrf
                  <button class="text-sm-custom text-red-500" type="submit">Supprimer</button>
                </form>
              </div>
            </div>
          </div>
          <p class="text-base-custom font-semibold">
            {{ number_format($item['prix'] * $item['quantite'], 2, ',', ' ') }} FCFA
          </p>
        </div>
      @empty
        <p class="text-gray-500">Votre panier est vide.</p>
      @endforelse

      @if ($panier && count($panier))
      <div class="flex items-center gap-2 border border-prima bg-green-50 text-sm-custom text-gray-800 px-4 py-3 rounded">
        <span class="text-prima text-xl">%</span>
        <p>10% de remise instantanée sur un achat minimum de 150 FCFA</p>
      </div>
      <form action="{{ route('panier.supprimer', 0) }}" method="POST">
        @csrf
        <button class="mt-6 px-6 py-2 border border-red-300 bg-red-600 text-white rounded text-sm-custom hover:bg-red-400 hover:text-white transition" type="submit">Vider le panier</button>
      </form>
      @endif
    </div>

    <!-- Récapitulatif commande -->
    <div class="border rounded p-6 shadow-sm">
      <h3 class="text-base-custom font-semibold mb-4">Récapitulatif de la commande</h3>
      <div class="space-y-8 text-sm-custom">
        <div class="flex justify-between">
          <span>Prix</span>
          <span>{{ number_format($total ?? 0, 2, ',', ' ') }} FCFA</span>
        </div>
        <div class="flex justify-between">
          <span>Remise</span>
          <span>-{{ number_format($remise ?? 0, 2, ',', ' ') }} FCFA</span>
        </div>
        <div class="flex justify-between">
          <span>Livraison</span>
          <span class="text-green-600">Gratuite</span>
        </div>
        <div class="flex justify-between">
          <span>Coupon appliqué</span>
          <span>0,00 FCFA</span>
        </div>
        <div class="border-t pt-2 flex justify-between font-bold">
          <span>Total</span>
          <span>{{ number_format($totalFinal ?? 0, 2, ',', ' ') }} FCFA</span>
        </div>
        <div class="flex justify-between items-center mt-4">
          <span class="text-xs-custom text-gray-500">Livraison estimée le</span>
          <span class="text-xs-custom font-medium">{{ now()->addDays(3)->format('d F Y') }}</span>
        </div>
        <div class="mt-4 flex items-center border rounded px-2 py-1">
          <input type="text" placeholder="Code promo" class="flex-1 outline-none text-sm-custom px-2" />
          <button class="text-gray-500 text-xl">🏷️</button>
        </div>
<form action="{{ route('adresse') }}" method="GET">
    <button type="submit" class="mt-4 w-full bg-green_p text-white py-2 rounded hover:bg-green-400 text-sm-custom">
        Procéder au paiement
    </button>
</form>

      </div>
    </div>
  </div>
</section>
@endsection

