@extends('layouts.app')

@section('title', 'infoclient')
@section('content')
<section class="px-4 md:px-16 py-10 bg-white my-7 font-sans">
  <!-- Titre + flèche -->
  <div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('assets/image/icones/fleche_client.png') }}" alt="Retour" class="w-8 h-8 cursor-pointer" />
    </a>
    <h1 class="text-2xl font-bold">Informations clients</h1>
  </div>

  <!-- Infos utilisateur -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start border-b pb-6 mb-8">
    <!-- Avatar -->
    <div class="flex gap-4 items-center  p-6">
      <img src="{{ asset('assets/image/image_client.png') }}" alt="Client" class="w-14 h-14 rounded-full object-cover" />
      <div>
        <p class="font-semibold">Robert Fox</p>
        <p class="text-sm text-gray-500">robert@email.com</p>
      </div>
    </div>

    <!-- Infos personnelles -->
    <div class="text-sm-custom border-r border-l px-8">
      <h3 class="text-lg">Informations personnelle</h3>
      <p><span class="text-black font-bold">Numéro de contact :</span> +229 0100658822</p>
      <p><span class="text-black font-bold">Sexe :</span> Homme</p>
      <p><span class="text-black font-bold">Date de naissance :</span> 1 Jan, 1985</p>
      <p><span class="text-black font-bold">Membre depuis :</span> 3 Mars, 2023</p>
    </div>

    <!-- Adresse + stats -->
    <div class="text-sm-custom px-4">
      <h3 class="text-lg">Adresse de livraison</h3>
      <p><span class="text-black font-bold">Adresse :</span> 3517 W. Gray St. Utica, Pennsylvania 57867</p>
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

  <!-- Recherche + filtre -->
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

  <!-- Tableau principal -->
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
  <!-- Order 1 - Complété -->
  <tr class="border-b hover:bg-gray-50 transition order-row completed" onclick="toggleDetails(this)">
    <td class="px-3 py-3 font-semibold">#6548</td>
    <td class="px-3">il y a 2 min</td>
    <td class="px-3">12,000 FCFA</td>
    <td class="px-3">CC</td>
    <td class="px-3 text-green-600 font-medium">Complété</td>
    <td class="px-3 text-right"><img src="{{ asset('assets/image/icones/icone_tableau_client.png') }}" class="w-4 h-4 inline" /></td>
  </tr>
  <tr class="hidden bg-gray-50 details-row">
    <td colspan="6" class="p-4">
      <!-- Tableau masqué (comme tu l'avais) -->
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
            <tr class="border-b text-center">
              <td class="px-2 py-2">1</td>
              <td class="px-2">#6548</td>
              <td class="px-2 font-semibold">Apple iPhone 13</td>
              <td class="px-2">12,000 FCFA</td>
              <td class="px-2">x1</td>
              <td class="px-2 text-red-500">5%</td>
              <td class="px-2">12,000 FCFA</td>
              <td class="px-2 text-right">
                <button onclick="window.print()">
                  <img src="{{ asset('assets/image/icones/imprimer.png') }}" alt="Imprimer" class="w-5 h-5 inline" />
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </td>
  </tr>

  <!-- Order 2 - Annulé -->
  <tr class="border-b hover:bg-gray-50 transition order-row canceled" onclick="toggleDetails(this)">
    <td class="px-3 py-3 font-semibold">#6549</td>
    <td class="px-3">hier</td>
    <td class="px-3">10,000 FCFA</td>
    <td class="px-3">CC</td>
    <td class="px-3 text-red-600 font-medium">Annulé</td>
    <td class="px-3 text-right"><img src="{{ asset('assets/image/icones/icone_tableau_client.png') }}" class="w-4 h-4 inline" /></td>
  </tr>
  <tr class="hidden bg-gray-50 details-row">
    <td colspan="6" class="p-4">
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
          <tr class="border-b text-center">
            <td class="px-2 py-2">1</td>
            <td class="px-2">#6548</td>
            <td class="px-2 font-semibold">Apple iPhone 13</td>
            <td class="px-2">12,000 FCFA</td>
            <td class="px-2">x1</td>
            <td class="px-2 text-red-500">5%</td>
            <td class="px-2">12,000 FCFA</td>
            <td class="px-2 text-right">
              <button onclick="window.print()">
                <img src="{{ asset('assets/image/icones/imprimer.png') }}" alt="Imprimer" class="w-5 h-5 inline" />
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
     <!-- Tableau masqué -->
    </td>
  </tr>

  <!-- Order 3 - En attente -->
  <tr class="border-b hover:bg-gray-50 transition order-row pending" onclick="toggleDetails(this)">
    <td class="px-3 py-3 font-semibold">#6550</td>
    <td class="px-3">03 Juin</td>
    <td class="px-3">15,000 FCFA</td>
    <td class="px-3">CC</td>
    <td class="px-3 text-yellow-600 font-medium">En attente</td>
    <td class="px-3 text-right"><img src="{{ asset('assets/image/icones/icone_tableau_client.png') }}" class="w-4 h-4 inline" /></td>
  </tr>
  <tr class="hidden bg-gray-50 details-row">
    <td colspan="6" class="p-4">
      <!-- Tableau masqué -->
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
        <tr class="border-b text-center">
          <td class="px-2 py-2">1</td>
          <td class="px-2">#6548</td>
          <td class="px-2 font-semibold">Apple iPhone 13</td>
          <td class="px-2">12,000 FCFA</td>
          <td class="px-2">x1</td>
          <td class="px-2 text-red-500">5%</td>
          <td class="px-2">12,000 FCFA</td>
          <td class="px-2 text-right">
            <button onclick="window.print()">
              <img src="{{ asset('assets/image/icones/imprimer.png') }}" alt="Imprimer" class="w-5 h-5 inline" />
            </button>
          </td>
        </tr>
      </tbody>
      </table>
      </div>
    </td>
  </tr>
     </tbody>

    </table>
  </div>
</section>


@vite('resources/js/orders-script.js')
@endsection

