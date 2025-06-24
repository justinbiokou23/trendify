

@extends('layouts.app')

@section('title', 'Transaction')
@section('content')
<section class="px-4 md:px-16 py-10 bg-white font-sans">
  <!-- Titre -->
  <div class="flex items-center gap-4 my-12">
    <a href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('assets/image/icones/fleche_client.png') }}" alt="Retour" class="w-8 h-8 cursor-pointer" />
    </a>
    <h1 class="text-2xl font-bold">Transaction</h1>
  </div>

  <!-- Filtres -->
  <div class="flex flex-wrap justify-between items-center mb-6 gap-4">
    <div class="flex gap-4 flex-wrap">
      <div class="relative w-64">
        <input type="text" placeholder="Rechercher par..." class="w-full border rounded pl-10 pr-4 py-2 text-sm-custom" />
        <img src="{{ asset('assets/image/icones/recherche_client.png') }}" class="absolute right-6 top-2.5 w-4 h-4" />
      </div>
      <button class="flex items-center border rounded px-3 py-2 text-sm-custom gap-1 text-gray-600">
        Status : Tout
        <img src="{{ asset('assets/image/icones/icone_client.png') }}" />
      </button>
    </div>

    <button class="flex items-center border rounded px-3 py-2 text-sm-custom gap-1 text-gray-600">
      Filtrer par N° de page
      <img src="{{ asset('assets/image/icones/icone_client.png') }}" />
    </button>
  </div>

  <!-- Tableau -->
  <div class="overflow-x-auto">
    <table class="w-full text-sm-custom border-t">
      <thead class="bg-gray-100 text-left">
        <tr>
          <th class="py-2 px-3">N° ID</th>
          <th class="py-2 px-3">Client</th>
          <th class="py-2 px-3">Date</th>
          <th class="py-2 px-3">Total</th>
          <th class="py-2 px-3">Méthode</th>
          <th class="py-2 px-3">Statut</th>
          <th class="py-2 px-3">Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ligne exemple -->
        <tr class="border-b">
          <td class="px-3 py-2 font-semibold">#5089</td>
          <td class="px-3">Joseph Wheeler</td>
          <td class="px-3">6 Avril 2025</td>
          <td class="px-3">50,000 FCFA</td>
          <td class="px-3">CC</td>
          <td class="px-3 text-green-600 font-medium">Payée</td>
          <td class="px-3">
            <select class="border border-gray-300 rounded px-2 py-1 text-sm-custom">
              <option selected>Choisir</option>
              <option>Rembourser</option>
            </select>
          </td>
        </tr>
        <!-- Tu dupliques selon tes besoins -->
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-6 flex justify-between items-center text-sm-custom text-gray-600">
    <div class="flex items-center gap-2">
      <span>Montrer</span>
      <select class="border rounded px-2 py-1">
        <option value="10">10</option>
        <option value="20">20</option>
      </select>
      <span>sur 50</span>
    </div>
    <div class="flex gap-1 items-center">
      <button class="text-gray-400 px-2 py-1">‹</button>
      <button class="bg-blue-600 text-white px-3 py-1 rounded">1</button>
      <button class="px-2 py-1">2</button>
      <button class="px-2 py-1">3</button>
      <button class="px-2 py-1">4</button>
      <button class="px-2 py-1">5</button>
      <button class="text-gray-600 px-2 py-1">›</button>
    </div>
  </div>
</section>
@endsection


