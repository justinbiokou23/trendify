   @extends('layouts.app')

   @section('title', 'Produits')
   @section('content')
  <div class="max-w-[1400px] mx-auto px-4 py-8 flex flex-col md:flex-row gap-6">

  <!-- SIDEBAR -->
      <aside class="w-full bg-white md:w-1/4
        p-6 rounded shadow space-y-6">

        <!-- FILTRE GLOBAL -->
          <div class="flex items-center justify-between cursor-pointer" id="toggle-all-filters">
            <h2 class="text-lg font-semibold">Filtre</h2>
            <img src="assets/image/icone_filtre.png" class="w-4 h-4" />
          </div>

          <!-- CATÉGORIES -->
          <div data-section>
            <div class="flex justify-between items-center cursor-pointer" data-toggle="section">
              <h3 class="font-medium text-sm">Catégories</h3>
              <img src="assets/image/icone_fleche.png" class="w-3 h-3 transform transition-transform arrow" />
            </div>
            <div data-content class="pl-2 space-y-1 text-sm text-gray-700 hidden">
              <label><input type="checkbox"> Écouteur</label><br>
              <label><input type="checkbox"> Radio</label><br>
              <label><input type="checkbox"> Casque</label><br>
              <label><input type="checkbox"> Ordinateur</label><br>
              <label><input type="checkbox"> Chargeur</label>
            </div>
          </div>

          <!-- USAGE -->
          <div data-section>
            <div class="flex justify-between items-center cursor-pointer" data-toggle="section">
              <h3 class="font-medium text-sm">Usage</h3>
              <img src="assets/image/icone_fleche.png" class="w-3 h-3 transform transition-transform arrow" />
            </div>
            <div data-content class="pl-2 space-y-1 text-sm text-gray-700 hidden">
              <label><input type="checkbox"> Materiel informatique</label><br>
              <label><input type="checkbox"> Smartphones</label><br>
              <label><input type="checkbox"> Ordinateurs</label>
            </div>
          </div>

          <!-- PRIX -->
          <div data-section>
            <div class="flex justify-between items-center cursor-pointer" data-toggle="section">
              <h3 class="font-medium text-sm">Prix</h3>
              <img src="assets/image/icone_fleche.png" class="w-3 h-3 transform transition-transform arrow" />
            </div>
            <div data-content class="pt-2 hidden">
              <div class="relative h-1 bg-gray-200 rounded mb-2 mt-4">
                <div id="rangeTrack" class="absolute h-1 bg-greenCustom rounded left-[25%] right-[25%] top-0"></div>
                <div id="minThumb" class="absolute top-[-7px] left-[25%] w-4 h-4 bg-greenCustom rounded-full cursor-pointer z-10"></div>
                <div id="maxThumb" class="absolute top-[-7px] left-[75%] w-4 h-4 bg-greenCustom rounded-full cursor-pointer z-10"></div>
              </div>
              <div class="flex justify-between text-xs text-gray-600">
                <span id="minPrice">XOF 50.000</span>
                <span id="maxPrice">XOF 200.000</span>
              </div>
            </div>
          </div>

          <button class="w-full bg-greenCustom text-white py-2 rounded hover:bg-green-600 transition">
            Appliquer le filtre
          </button>
      </aside>

      <!-- CONTENU PRODUITS -->
  <section class="w-full bg-white md:w-3/4">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-semibold">Produits</h2>
      <div class="flex items-center gap-2 text-sm">
        <label for="tri">Trier par :</label>
        <select id="tri" class="border border-gray-300 rounded px-2 py-1 text-sm">
          <option>les plus achetés</option>
          <option>prix croissant</option>
          <option>prix décroissant</option>
        </select>
      </div>
    </div>

    <!-- GRILLE PRODUITS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @forelse($produits as $produit)
      <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
        <a href="{{ route('produit_details', $produit->id) }}">
          <img src="{{ asset('storage/'.$produit->image) }}"
               class="w-full h-40 object-cover rounded mb-3"
               alt="{{ $produit->nom }}" />
        </a>
        <h3 class="text-sm font-medium mb-1">{{ $produit->nom }}</h3>
        <div class="flex items-center text-yellow-400 text-sm mb-1">
          ★★★★☆ <span class="ml-2 text-gray-500">4.3/5</span>
        </div>
        <div class="text-sm">
          <span class="font-bold">{{ number_format($produit->prix, 0, ',', ' ') }} XOF</span>
          {{-- Si tu veux afficher un prix barré, adapte ici --}}
        </div>
      </div>
      @empty
      <p class="text-gray-500 col-span-3 text-center py-6">Aucun produit disponible.</p>
      @endforelse
    </div>
  </section>
  </div>
  @endsection


