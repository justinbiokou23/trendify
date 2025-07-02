@extends('layouts.app')

@section('title', 'Produits_details')
@section('content')
<!-- PAGE PRODUIT - Trendify -->
<section class="px-4 md:px-12 py-10 bg-white font-sans">
  <!-- Retour -->
  <div class="mb-4">
    <a href="{{ route('produit') }}" class="text-sm-custom text-gray-500 hover:underline inline-flex items-center gap-1">
      <img src="{{ asset('assets/image/icones/retour.png') }}" alt="Retour" class="w-4 h-4" />
      Retour
    </a>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
    <!-- Infos produit -->
    <div>
      <h1 class="text-3xl-custom font-bold mb-2">{{ $produit->nom }}</h1>
      <p class="text-xl-custom font-semibold text-black mb-2">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
      <div class="flex items-center gap-2 mb-3">
        <div class="text-accent">★★★★☆</div>
        <p class="text-sm-custom text-gray-600">4.6 / 5.0 (556)</p>
      </div>
      <p class="text-base-custom text-black mb-4">
        {{ $produit->description }}
      </p>
      {{-- Couleurs --}}
      <div class="flex items-center gap-2 mb-4">
        <span class="h-5 w-5 rounded-full bg-[#C4C4C4] border border-gray-300 cursor-pointer"></span>
        <span class="h-5 w-5 rounded-full bg-[#96C0B7] border border-gray-300 cursor-pointer"></span>
        <span class="h-5 w-5 rounded-full bg-[#609098] border border-gray-300 cursor-pointer"></span>
      </div>
      <!-- Quantité + bouton panier -->
      <div class="flex items-center gap-4 mb-4">
        <div class="flex items-center border rounded">
          <button class="px-3 py-1 text-lg" onclick="updateQty(-1)">−</button>
          <input id="quantity" type="text" value="1" class="w-12 text-center outline-none py-1" readonly />
          <button class="px-3 py-1 text-lg" onclick="updateQty(1)">+</button>
        </div>
        <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
              @csrf
              <button type="submit" class="bg-prima text-white text-sm-custom px-6 py-2 rounded hover:bg-blue-400">
                  Ajouter au panier
              </button>
        </form>
      </div>
      <!-- Infos livraison -->
      <ul class="text-sm-custom text-black mb-4 list-disc pl-5">
        <li>Livraison gratuite en 3–5 jours</li>
        <li>Assemblage sans outil</li>
        <li>Essai de 30 jours</li>
      </ul>
      <button class="text-sm-custom text-prima">❤ Favoris</button>
    </div>

    <!-- Image principale seule, à droite, sans miniatures, sans indicateur -->
    <div class="flex items-center justify-center w-full">
      <img
        src="{{ asset('storage/' . $produit->image) }}"
        class="w-full max-h-[460px] object-contain rounded transition-all duration-300"
        alt="{{ $produit->nom }}"
      />
    </div>
  </div>
</section>
<section class="px-4 md:px-16 py-14 bg-white font-sans">
  <!-- Onglets -->
  <div class="flex justify-between border-b border-gray-200 mb-8">
    <button class="tab-btn active-tab text-black font-semibold text-sm-custom pb-3 border-b-2 border-black"
            onclick="showTabSection('details', event)">
      Product Details
    </button>
    <button class="tab-btn text-gray-500 text-sm-custom pb-3 hover:text-black"
            onclick="showTabSection('reviews', event)">
      Rating & Reviews
    </button>
    <button class="tab-btn text-gray-500 text-sm-custom pb-3 hover:text-black"
            onclick="showTabSection('faq', event)">
      FAQs
    </button>
  </div>

  <!-- Contenu : Détails -->
  <div id="tab-details" class="tab-section">
    <p class="text-sm-custom text-gray-700 leading-relaxed max-w-3xl">
      Ce produit allie esthétisme et fonctionnalité. Conçu avec des matériaux durables, il s’intègre parfaitement à tout espace moderne.
      Facile à assembler, robuste, et doté d’un confort optimal, il répond aux attentes les plus exigeantes.
    </p>
  </div>

  <!-- Contenu : Avis -->
  <div id="tab-reviews" class="tab-section hidden">
    <h3 class="text-sm-custom font-semibold text-black mb-4">All Reviews (51)</h3>
    <div class="grid md:grid-cols-2 gap-4 mb-6">
      <!-- Avis 1 -->
      <div class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm">
        <div class="flex items-center justify-between mb-2">
          <div class="text-yellow-400">★★★★☆</div>
          <span class="text-xs text-gray-400">...</span>
        </div>
        <p class="text-sm-custom font-bold mb-1 flex items-center gap-2">
          Samantha D.
          <span class="inline-block w-4 h-4 bg-green-500 text-white text-xs rounded-full text-center leading-4">✔</span>
        </p>
        <p class="text-xs-custom text-gray-600">
          I absolutely love this t-shirt! The design is unique and the fabric feels so comfortable...
        </p>
      </div>

      <!-- Avis 2 -->
      <div class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm">
        <div class="flex items-center justify-between mb-2">
          <div class="text-yellow-400">★★★★★</div>
          <span class="text-xs text-gray-400">...</span>
        </div>
        <p class="text-sm-custom font-bold mb-1 flex items-center gap-2">
          Alex M.
          <span class="inline-block w-4 h-4 bg-green-500 text-white text-xs rounded-full text-center leading-4">✔</span>
        </p>
        <p class="text-xs-custom text-gray-600">
          The t-shirt exceeded my expectations! The colors are vibrant and the print quality is top-notch...
        </p>
      </div>
      <div class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm">
        <div class="flex items-center justify-between mb-2">
          <div class="text-yellow-400">★★★★★</div>
          <span class="text-xs text-gray-400">...</span>
        </div>
        <p class="text-sm-custom font-bold mb-1 flex items-center gap-2">
          Alex M.
          <span class="inline-block w-4 h-4 bg-green-500 text-white text-xs rounded-full text-center leading-4">✔</span>
        </p>
        <p class="text-xs-custom text-gray-600">
          The t-shirt exceeded my expectations! The colors are vibrant and the print quality is top-notch...
        </p>
      </div>
      <div class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm">
        <div class="flex items-center justify-between mb-2">
          <div class="text-yellow-400">★★★★★</div>
          <span class="text-xs text-gray-400">...</span>
        </div>
        <p class="text-sm-custom font-bold mb-1 flex items-center gap-2">
          Alex M.
          <span class="inline-block w-4 h-4 bg-green-500 text-white text-xs rounded-full text-center leading-4">✔</span>
        </p>
        <p class="text-xs-custom text-gray-600">
          The t-shirt exceeded my expectations! The colors are vibrant and the print quality is top-notch...
        </p>
      </div>
    </div>

    <button class="text-sm-custom px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 mb-4 block mx-auto">
        Load More Reviews
    </button>

  </div>

  <!-- Contenu : FAQ -->
  <div id="tab-faq" class="tab-section hidden">
    <div class="space-y-4 text-sm-custom text-gray-700">
      <div>
        <strong>Q: Est-ce que ce produit est facile à assembler ?</strong>
        <p class="text-xs-custom">Oui, aucun outil n'est nécessaire pour l'assemblage.</p>
      </div>
      <div>
        <strong>Q: Quelle est la durée de la garantie ?</strong>
        <p class="text-xs-custom">Une garantie de 1 an est incluse.</p>
      </div>
      <div>
        <strong>Q: Peut-on retourner le produit ?</strong>
        <p class="text-xs-custom">Oui, dans un délai de 30 jours après achat.</p>
      </div>
    </div>
  </div>
</section>
<section class="px-4 md:px-16 py-12 bg-white font-sans">
  <h2 class="text-3xl-custom text-center font-bold mb-8">Vous pourriez aussi aimer</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    @foreach($suggestions as $p)
    <div class="rounded-lg overflow-hidden text-left">
      <a href="{{ route('produit_details', $p->id) }}">
        <img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->nom }}" class="mb-2 w-auto h-48 object-contain rounded" />
      </a>
      <p class="text-sm-custom font-semibold">{{ $p->nom }}</p>
      <div class="flex items-center gap-1 text-sm-custom text-yellow-400 mb-1">
        <span>★★★★☆</span>
        <span class="text-gray-600">4.0/5</span>
      </div>
      <p class="text-sm-custom text-black font-semibold">
        {{ number_format($p->prix, 0, ',', ' ') }} FCFA
      </p>
    </div>
    @endforeach
  </div>
</section>
@vite('resources/js/details_produit.js')
@endsection



