@extends('layouts.app')

@section('title', 'profil')
@section('content')
  <!-- Bloc titre + onglets verticaux -->
  <div class="p-12 ">
    <h1 class="text-3xl-custom font-bold mb-6">Profil Utilisateur</h1>
    <div class="flex gap-12 text-lg-custom font-semibold border-b border-gray-300">
      <button id="tab-general" class="tab-link text-black pb-3 border-b-2 border-black" onclick="showTab('general')">
        Général
      </button>
      <button id="tab-commandes" class="tab-link text-gray-500 pb-3 hover:text-black" onclick="showTab('commandes')">
        Détails des commandes
      </button>
    </div>
  </div>

  @if(session('profil_updated'))
    <div class="text-green-600 px-6">Profil mis à jour avec succès !</div>
  @endif
<section class="px-4 md:px-16 py-10 bg-white font-sans" id="profil-general">
  <div class="flex flex-col md:flex-row gap-12">
    <!-- Bloc image + stats + upload -->
    <div class="flex flex-col items-center gap-4">
      <img id="previewImage"
           src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('assets/image/profil_image.png') }}"
           class="w-36 h-36 object-cover rounded-full border-4 border-green-500" />
      <h3 id="displayName" class="text-lg-custom font-bold">{{ $user->name }}</h3>
      <div class="flex justify-center gap-8 text-center text-sm-custom font-medium mb-2">
        <div><p class="font-bold text-black text-xl-custom">210</p><p class="text-gray-500">Commandes</p></div>
        <div><p class="font-bold text-black text-xl-custom">155</p><p class="text-gray-500">Livraison effectuée</p></div>
        <div><p class="font-bold text-black text-xl-custom">101</p><p class="text-gray-500">Produits en attente</p></div>
      </div>
    </div>

    @if($profilComplet)
      <!-- Affichage des infos enregistrées -->
      <div class="flex-1 flex flex-col gap-4 justify-center">
          <h4 class="font-bold text-base-custom mb-2">Informations de base</h4>
          <p><strong>Nom d'utilisateur :</strong> {{ $user->name }}</p>
          <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
          <p><strong>Sexe :</strong> {{ $user->sexe }}</p>
          <p><strong>Date de naissance :</strong> {{ $user->date_naissance }}</p>
          <p><strong>Email :</strong> {{ $user->email }}</p>
          <a href="{{ route('profil.edit') }}">
              <button class="mt-4 bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Modifier le profil</button>
          </a>
      </div>
    @else
      <!-- Formulaire AVEC l'input file DANS le form -->
      <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="flex-1 space-y-6">
        @csrf
        <div class="flex flex-col items-center gap-4 mb-4">
          <label class="bg-green-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-green-600">
            Télécharger une photo
            <input type="file" name="photo" accept="image/*" class="hidden" id="photoInput" required>
          </label>
        </div>
        <div>
          <h4 class="font-bold text-base-custom mb-2">Informations de base</h4>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nom d'utilisateur" class="border rounded px-4 py-2 w-full text-sm-custom" required />
            <input type="text" name="telephone" value="{{ old('telephone', $user->telephone) }}" placeholder="Numéro de téléphone" class="border rounded px-4 py-2 w-full text-sm-custom" required />
          </div>
        </div>
        <div>
          <label class="block mb-1 text-sm-custom font-medium">Sexe</label>
          <select name="sexe" class="border rounded px-4 py-2 w-full text-sm-custom" required>
            <option value="">Sélectionner</option>
            <option value="Homme" {{ $user->sexe == 'Homme' ? 'selected' : '' }}>Homme</option>
            <option value="Femme" {{ $user->sexe == 'Femme' ? 'selected' : '' }}>Femme</option>
            <option value="Autre" {{ $user->sexe == 'Autre' ? 'selected' : '' }}>Autre</option>
          </select>
        </div>
        <div>
          <label class="block mb-1 text-sm-custom font-medium">Date de naissance</label>
          <input type="date" name="date_naissance" value="{{ old('date_naissance', $user->date_naissance) }}" class="border rounded px-4 py-2 w-full text-sm-custom" required />
        </div>
        <div>
          <label class="block mb-1 text-sm-custom font-medium">E-mail</label>
          <input type="email" value="{{ $user->email }}" class="border rounded px-4 py-2 w-full text-sm-custom bg-gray-100" readonly />
        </div>
        <div class="text-right">
          <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded text-sm-custom hover:bg-green-600">Valider</button>
        </div>
      </form>
    @endif
  </div>
</section>
<section id="profil-commandes" class="px-4 md:px-16 py-10 bg-white font-sans hidden">
  <h3>Vue globale</h3>
  <!-- Vue globale -->
  <div class="grid grid-cols-1 my-6 md:grid-cols-3 gap-4 mb-10">
    <div class="bg-green-100 p-4 rounded">
      <p class="text-sm-custom text-gray-600">Commande total</p>
      <p class="text-green-700 font-bold text-lg-custom">430,000 XOF</p>
      <p class="text-xs-custom text-gray-600">Sur un total de 380 commandes</p>
    </div>
    <div class="bg-blue-100 p-4 rounded">
      <p class="text-sm-custom text-gray-600">Remise effectuée</p>
      <p class="text-blue-700 font-bold text-lg-custom">100,000 XOF</p>
      <p class="text-xs-custom text-gray-600">Sur un total de 280 commandes</p>
    </div>
    <div class="border p-4 rounded">
      <p class="text-sm-custom text-gray-600">Mode de paiement</p>
      <div class="flex justify-between items-center mt-1">
        <p class="text-black font-semibold text-sm-custom">💳 1502********4832</p>
      </div>
    </div>
  </div>

  <!-- Filtres -->
  <h3>Statut des commandes</h3>
  <div class="flex flex-wrap gap-3 my-6 text-sm-custom font-medium">
    <button class="status-btn active-status border border-gray-300 rounded-full px-4 py-1" onclick="filterStatus('all')">Tout</button>
    <button class="status-btn border border-gray-300 rounded-full px-4 py-1" onclick="filterStatus('Livré')">Livré</button>
    <button class="status-btn border border-gray-300 rounded-full px-4 py-1" onclick="filterStatus('Expédié')">Expédié</button>
    <button class="status-btn border border-gray-300 rounded-full px-4 py-1 text-red-500" onclick="filterStatus('En attente')">En attente</button>
  </div>

  <!-- Tableau des commandes -->
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm-custom border-t">
      <thead class="bg-gray-100 text-left">
        <tr>
          <th class="py-2 px-3">Numéro ID</th>
          <th class="py-2 px-3">Date</th>
          <th class="py-2 px-3">Montant</th>
          <th class="py-2 px-3">Commande Totale</th>
          <th class="py-2 px-3">Statut</th>
        </tr>
      </thead>
      <tbody id="orderTable">
        <tr class="border-b"><td class="px-3 py-2">#15267</td><td class="px-3">01 Avril, 2025</td><td class="px-3">100</td><td class="px-3">1</td><td class="px-3 text-green-600">Succès</td></tr>
        <tr class="border-b"><td class="px-3 py-2">#15858</td><td class="px-3">01 Avril, 2025</td><td class="px-3">300</td><td class="px-3">3</td><td class="px-3 text-green-600">Livré</td></tr>
        <tr class="border-b"><td class="px-3 py-2">#12246</td><td class="px-3">01 Avril, 2025</td><td class="px-3">150</td><td class="px-3">5</td><td class="px-3 text-green-600">Livré</td></tr>
        <tr class="border-b"><td class="px-3 py-2">#16879</td><td class="px-3">01 Avril, 2025</td><td class="px-3">300</td><td class="px-3">5</td><td class="px-3 text-red-500">En attente</td></tr>
        <tr class="border-b"><td class="px-3 py-2">#16907</td><td class="px-3">01 Avril, 2025</td><td class="px-3">100</td><td class="px-3">1</td><td class="px-3 text-blue-500">Expédié</td></tr>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-6 flex items-center gap-2 text-sm-custom text-gray-600">
    <label for="pagination">Afficher</label>
    <select id="pagination" class="border rounded px-2 py-1 text-sm-custom">
      <option value="10">10</option>
      <option value="20">20</option>
    </select>
    <span>par page</span>
    <div class="ml-auto flex gap-2 items-center">
      <button class="text-gray-400">‹</button>
      <span class="text-black">1</span>
      <button class="text-gray-600">›</button>
    </div>
  </div>
</section>
@vite('resources/js/profil.js')

@endsection
