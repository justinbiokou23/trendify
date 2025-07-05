@extends('layouts.app')

@section('title', 'Info client')
@section('content')
<section class="px-4 md:px-16 py-10 bg-white my-7 font-sans">
  <!-- Titre + flèche -->
  <div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.clients.index') }}">
      <img src="{{ asset('assets/image/icones/fleche_client.png') }}" alt="Retour" class="w-8 h-8 cursor-pointer" />
    </a>
    <h1 class="text-2xl font-bold">Informations client</h1>
  </div>

  <!-- Infos utilisateur -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start border-b pb-6 mb-8">
    <!-- Avatar -->
    <div class="flex gap-4 items-center  p-6">
      <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/image/image_client.png') }}" alt="Client" class="w-14 h-14 rounded-full object-cover" />
      <div>
        <p class="font-semibold">{{ $user->name }}</p>
        <p class="text-sm text-gray-500">{{ $user->email }}</p>
      </div>
    </div>

    <!-- Infos personnelles -->
    <div class="text-sm-custom border-r border-l px-8">
      <h3 class="text-lg">Informations personnelles</h3>
      <p><span class="text-black font-bold">Numéro de contact :</span> {{ $user->telephone ?? '-' }}</p>
      <p><span class="text-black font-bold">Sexe :</span> {{ $user->sexe ?? '-' }}</p>
      <p><span class="text-black font-bold">Date de naissance :</span> {{ $user->date_naissance ?? '-' }}</p>
      <p><span class="text-black font-bold">Membre depuis :</span> {{ $user->created_at ? $user->created_at->format('d M, Y') : '-' }}</p>
    </div>

    <!-- Adresse + stats -->
    <div class="text-sm-custom px-4">
      <h3 class="text-lg">Adresse de livraison</h3>
      <p><span class="text-black font-bold">Adresse :</span> {{ $user->adresse ?? 'Non renseignée' }}</p>
      <div class="flex gap-6 mt-3">
        <div><p class="font-bold text-center">150</p><p class="text-gray-500 text-xs">Commandes totales</p></div>
        <div><p class="font-bold text-center">140</p><p class="text-gray-500 text-xs">Complétées</p></div>
        <div><p class="font-bold text-center">10</p><p class="text-gray-500 text-xs">Annulées</p></div>
      </div>
    </div>
  </div>

  <!-- Onglets -->
  <div class="flex gap-8 border-b mb-6">
    <button class="order-tab text-blue-600 border-b-2 border-blue-600 font-medium pb-2" data-status="all" onclick="showOrders('all')">Toutes les commandes</button>
    <button class="order-tab text-gray-500 pb-2" data-status="completed" onclick="showOrders('completed')">Complétées</button>
    <button class="order-tab text-gray-500 pb-2" data-status="canceled" onclick="showOrders('canceled')">Annulées</button>
    <button class="order-tab text-gray-500 pb-2" data-status="pending" onclick="showOrders('pending')">En attente</button>
  </div>

  <!-- Recherche + filtre (optionnel à rendre dynamique plus tard) -->
  <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
    <div class="relative w-full sm:w-60">
      <input type="text" placeholder="Recherche par..." class="w-full border rounded pl-10 pr-4 py-2 text-sm-custom" />
      <img src="{{ asset('assets/image/icones/recherche_client.png') }}" class="absolute right-3 top-2.5 w-4 h-4 text-gray-400" />
    </div>
    <button class="flex items-center text-sm-custom border rounded px-3 py-2 gap-1 text-gray-600">
      Filtrer par date de création
      <img src="{{ asset('assets/image/icones/icone_client.png') }}"/>
    </button>
  </div>

  <!-- Tableau principal des commandes du client -->
  <div class="overflow-x-auto">
    <table class="w-full text-sm-custom border-t">
      <thead class="bg-gray-100 text-left">
        <tr>
          <th class="py-2 px-3">N° ID</th>
          <th class="py-2 px-3">Créé</th>
          <th class="py-2 px-3">Total</th>
          <th class="py-2 px-3">Paiement</th>
          <th class="py-2 px-3">Statut</th>
          <th class="py-2 px-3 text-right"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($user->orders ?? [] as $order)
          <tr class="border-b hover:bg-gray-50 transition order-row {{ $order->status }}" onclick="toggleDetails(this)">
            <td class="px-3 py-3 font-semibold">#{{ $order->id }}</td>
            <td class="px-3">{{ $order->created_at->diffForHumans() }}</td>
            <td class="px-3">{{ number_format($order->total, 0, ',', ' ') }} FCFA</td>
            <td class="px-3">{{ $order->payment_method ?? '-' }}</td>
            <td class="px-3 text-green-600 font-medium">{{ ucfirst($order->status) }}</td>
            <td class="px-3 text-right"><img src="{{ asset('assets/image/icones/icone_tableau_client.png') }}" class="w-4 h-4 inline" /></td>
          </tr>
          <tr class="hidden bg-gray-50 details-row">
            <td colspan="6" class="p-4">
              <!-- Tableau des items de commande si besoin -->
              <div class="overflow-x-auto">
                <table class="w-full text-sm-custom mb-2">
                  <thead class="bg-white text-gray-500 text-center">
                    <tr>
                      <th class="py-2 px-2">#</th>
                      <th class="py-2 px-2">SKU</th>
                      <th class="py-2 px-2">Nom</th>
                      <th class="py-2 px-2">Prix</th>
                      <th class="py-2 px-2">Qtité</th>
                      <th class="py-2 px-2">%</th>
                      <th class="py-2 px-2">Total</th>
                      <th class="py-2 px-2 text-right">Imprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order->items as $i => $item)
                      <tr class="border-b text-center">
                        <td class="px-2 py-2">{{ $i + 1 }}</td>
                        <td class="px-2">#{{ $item->id }}</td>
                        <td class="px-2 font-semibold">{{ $item->product->nom ?? '' }}</td>
                        <td class="px-2">{{ number_format($item->prix, 0, ',', ' ') }} FCFA</td>
                        <td class="px-2">x{{ $item->quantite }}</td>
                        <td class="px-2 text-red-500">{{ $item->discount ?? '0' }}%</td>
                        <td class="px-2">{{ number_format($item->prix * $item->quantite, 0, ',', ' ') }} FCFA</td>
                        <td class="px-2 text-right">
                          <button onclick="window.print()">
                            <img src="{{ asset('assets/image/icones/imprimer.png') }}" alt="Imprimer" class="w-5 h-5 inline" />
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-8 text-gray-400">Aucune commande pour ce client.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
@vite('resources/js/orders-script.js')
@endsection
