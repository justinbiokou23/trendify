@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<!-- Sidebar -->
<div class="flex">
  <aside class="w-60  bg-white border-r p-6">
    <h2 class="text-sm text-gray-500 uppercase mb-6">Main Menu</h2>
    <nav class="space-y-6 text-sm">
      <a href="{{route('admin.dashboard')}}" class="flex items-center gap-2 text-black font-semibold">
        <img src="{{ asset('assets/image/icones/vue_globale.png') }}" class="w-4 h-4" /> Vue globale
      </a>
      <a href="{{route('admin.commandes')}}" class="flex items-center gap-2 text-gray-500 hover:text-black">
        <img src="{{ asset('assets/image/icones/gestion_commandes.png') }}" class="w-4 h-4" /> Gestion des commandes
      </a>
      <a href="{{route('admin.clients.index')}}" class="flex items-center gap-2 text-gray-500 hover:text-black">
        <img src="{{ asset('assets/image/icones/clients.png') }}" class="w-4 h-4" /> Clients
      </a>
      <a href="{{route('admin.transactions')}}" class="flex items-center gap-2 text-gray-500 hover:text-black">
        <img src="{{ asset('assets/image/icones/transation.png') }}" class="w-4 h-4" /> Transaction
      </a>
    </nav>

    <h2 class="text-sm text-gray-500 uppercase mt-10 mb-4">Products</h2>
    <nav class="space-y-4 text-sm">
      <a href="{{route('admin.produits.create')}}" class="flex items-center gap-2 text-gray-500 hover:text-black">
        <img src="{{ asset('assets/image/icones/ajouter_produit.png') }}" class="w-4 h-4" /> Ajouter produits
      </a>
      <a href="{{route('admin.produits.index')}}" class="flex items-center gap-2 text-gray-500 hover:text-black">
        <img src="{{ asset('assets/image/icones/liste_produit.png') }}" class="w-4 h-4" /> Listes des produits
      </a>
    </nav>
  </aside>

  <!-- Main content -->
  <main class="flex-1 mt-12 p-2 space-y-6 bg-cleanwithe">
    <div class="flex justify-between items-start">
      <h1 class="text-xl font-bold">Vue globale</h1>
      <div class="flex items-center gap-4">
        <img src="{{ asset('assets/image/icones/Notification.png') }}" class="w-8" />
        <img src="{{ asset('assets/image/icones/profile.png') }}" class="w-8" />
      </div>
    </div>

    <!-- Cartes de statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
      <!-- Ventes et coûts -->
      <div class="bg-white rounded-xl p-6 shadow-sm col-span-2">
        <h3 class="text-base-custom font-bold text-black">Total ventes et coûts</h3>
        <p class="text-sm text-gray-400 mb-4">7 derniers jours</p>
        <div class="text-2xl font-bold">$350K</div>
        <p class="text-sm text-green-500 mt-1">+8.56K vs last 7 days</p>
        <canvas id="chartVentes" class="mt-4 "></canvas>
      </div>

      <!-- Total commandes / bénéfice -->
      <div class="space-y-4">
        <div class="bg-white rounded-xl p-6 shadow-sm">
          <h3 class="text-base-custom font-bold text-black">Total des commandes</h3>
          <p class="text-sm text-gray-400">7 derniers jours</p>
          <div class="text-2xl font-bold mt-2">25.7K</div>
          <p class="text-sm text-green-500 mt-1">+6% vs 7 derniers jours</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm">
          <h3 class="text-base-custom font-bold text-black">Bénéfice total</h3>
          <p class="text-sm text-gray-400">7 derniers jours</p>
          <div class="text-2xl font-bold mt-2">50K</div>
          <p class="text-sm text-green-500 mt-1">+12% 7 derniers jours</p>
        </div>
      </div>
    </div>

    <!-- Analyse + camembert -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 pt-8">
      <!-- Analyse des commandes -->
      <div class="bg-white rounded-xl p-6 shadow-sm col-span-2">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-sm font-bold">Analyse des commandes</h3>
          <div class="flex gap-3 text-xs text-gray-600">
            <span class="flex items-center gap-1"><span class="w-2 h-2 bg-blue-500 rounded-full"></span>Commandes hors ligne</span>
            <span class="flex items-center gap-1"><span class="w-2 h-2 bg-orange-500 rounded-full"></span>Commandes en ligne</span>
          </div>
          <div class="flex items-center space-x-2">
              <span class="text-sm text-gray-500">Mois</span>
              <img src="{{ asset('assets/image/icones/mois.png') }}" class="" alt="Flèche" />
          </div>
        </div>
        <canvas id="chartAnalyse" class="h-40"></canvas>
      </div>

      <!-- Les revenus -->
      <div class="bg-white rounded-xl p-6 shadow-sm">
        <h3 class="text-sm font-bold mb-4">Les revenus</h3>
        <canvas id="chartRevenus" class="h-40"></canvas>
        <div class="flex justify-around text-xs mt-4">
            <span class="flex items-center gap-1"><span class="w-2 h-2 bg-green-500 rounded-full"></span> Hors ligne</span>
            <span class="flex items-center gap-1"><span class="w-2 h-2 bg-orange-500 rounded-full"></span> En ligne</span>
            <span class="flex items-center gap-1"><span class="w-2 h-2 bg-blue-500 rounded-full"></span> En ligne</span>
        </div>
      </div>
    </div>

    <!-- Liste des commandes -->
    <div class="bg-white rounded-xl p-6 shadow-sm">
      <h3 class="text-sm font-bold mb-4">Liste de commande</h3>
      <table class="w-full text-sm">
        <thead class="text-left text-gray-500 border-b">
          <tr>
            <th class="py-2">No</th>
            <th>ID</th>
            <th>Date</th>
            <th>Nom du client</th>
            <th>Adresse</th>
            <th>Montant</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="py-2">1</td><td>#12594</td><td>Dec 1, 2021</td><td>Frank Murlo</td><td>312 S Wilmette Ave</td><td>50,000 FCFA</td><td><span class="text-green-600 font-semibold">Nouvelle</span></td>
          </tr>
          <tr class="border-b">
            <td class="py-2">2</td><td>#12490</td><td>Nov 15, 2021</td><td>Thomas Bleir</td><td>Lathrop Ave, Harvey</td><td>50,000 FCFA</td><td><span class="text-yellow-500 font-semibold">Livraison</span></td>
          </tr>
          <tr>
            <td class="py-2">3</td><td>#12306</td><td>Nov 02, 2021</td><td>Bill Norton</td><td>5685 Bruce Ave</td><td>50,000 FCFA</td><td><span class="text-yellow-500 font-semibold">Livraison</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
@vite('resources/js/dashboard.js')

@endsection
