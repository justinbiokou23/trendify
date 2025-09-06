@extends('layouts.app')

@section('title', 'Gestion des commandes')
@section('content')
<section class="px-4 md:px-16 py-10 bg-white font-sans">
  <!-- Titre + flèche -->
  <div class="flex items-center justify-between my-12">
    <div class="flex items-center gap-4">
      <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/image/icones/fleche_client.png') }}" alt="Retour" class="w-8 h-8 cursor-pointer" /></a>
      <h1 class="text-2xl font-bold">Gestion des commandes</h1>
    </div>
  </div>

  <!-- Onglets navigation -->
<!-- Onglets navigation -->
<div class="flex gap-6 border-b mb-6 text-sm-custom font-semibold">
  <button type="button" class="tab-link text-blue-600 border-b-2 border-blue-600 pb-2 text-xl" data-status="en_attente">En attente</button>
  <button type="button" class="tab-link text-gray-500 pb-2 text-xl" data-status="confirme">Confirmé</button>
  <button type="button" class="tab-link text-gray-500 pb-2 text-xl" data-status="traitement">Traitement</button>
  <button type="button" class="tab-link text-gray-500 pb-2 text-xl" data-status="rembourse">Remboursé</button>
  <button type="button" class="tab-link text-gray-500 pb-2 text-xl" data-status="expedie">Expédié</button>
  <button type="button" class="tab-link text-gray-500 pb-2 text-xl" data-status="livre">Livré</button>
  <button type="button" class="tab-link text-gray-500 pb-2 text-xl" data-status="annule">Annulé</button>
</div>


  <!-- Recherche + filtre -->
  <div class="flex justify-between items-center mb-4">
    <div class="relative w-64">
      <input type="text" placeholder="Recherche par....." class="w-full border rounded pl-10 pr-4 py-2 text-sm-custom" />
      <img src="{{ asset('assets/image/icones/recherche_client.png') }}" class="absolute right-8 top-2.5 w-4 h-4" />
    </div>
    <button class="flex items-center text-sm-custom border rounded px-3 py-2 gap-1 text-gray-600">
      Filtrer par plage de dates
      <img src="{{ asset('assets/image/icones/icone_client.png') }}" />
    </button>
  </div>

  <!-- Tableau -->
  <div class="overflow-x-auto">
    <table class="w-full text-sm-custom text-left border-t">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-2 px-3">N°ORDRE</th>
          <th class="py-2 px-3">CLIENTS</th>
          <th class="py-2 px-3">TOTAL</th>
          <th class="py-2 px-3">BÉNÉFICE</th>
          <th class="py-2 px-3">STATUT</th>
          <th class="py-2 px-3">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b hover:bg-gray-50 transition">
          <td class="px-3 py-3 font-semibold">#6548</td>
          <td class="px-3">Joseph Wheeler</td>
          <td class="px-3">$654</td>
          <td class="px-3">$154 <span class="bg-green-100 text-green-600 text-xs px-2 py-0.5 rounded ml-1">16%</span></td>
          <td class="px-3">
            <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded">En attente</span>
          </td>
          <td class="px-3">
            <select class="border rounded px-2 py-1 text-xs">
              <option value="">Choisir</option>
              <option value="confirme">Confirmé</option>
              <option value="livre">Livré</option>
              <option value="rembourse">Remboursé</option>
              <option value="expedie">Expédié</option>
              <option value="traitement">Traitement</option>
            </select>
          </td>
        </tr>
        <!-- Tu peux dupliquer les lignes ici -->
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="flex justify-between items-center mt-6 text-sm-custom text-gray-600">
    <div>
      <label for="pagination" class="mr-2">Afficher</label>
      <select id="pagination" class="border rounded px-2 py-1">
        <option>10</option>
        <option>20</option>
        <option>50</option>
      </select>
      <span class="ml-2">sur 50</span>
    </div>
    <div class="flex gap-2">
      <button class="px-2 py-1 text-gray-400 border rounded">&lt;</button>
      <button class="px-2 py-1 bg-blue-600 text-white rounded">1</button>
      <button class="px-2 py-1 border rounded">2</button>
      <button class="px-2 py-1 border rounded">3</button>
      <button class="px-2 py-1 border rounded">4</button>
      <button class="px-2 py-1 border rounded">5</button>
      <button class="px-2 py-1 text-gray-600 border rounded">&gt;</button>
    </div>
  </div>
</section>
@vite('resources/js/commandes.js')
@endsection
