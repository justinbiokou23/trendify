   @extends('layouts.app')

   @section('title', 'Accueil')
   @section('content')
    <!-- BANNIÈRE PRINCIPALE -->
    <section
      class="relative h-[300px] md:h-[300px] bg-cover bg-center flex items-center px-6 md:px-16"
      style="background-image: url('assets/image/img_acceuil_s1.png')"
         >
      <div class="absolute inset-0 bg-black/5"></div>
      <div class="relative z-10 text-white max-w-xl">
        <h2 class="text-3xl md:text-5xl mb-4 text-black">
          Des accessoires incontournables
        </h2>
        <p class="text-base-custom mb-6 text-black">
          Meilleurs produits, rapport qualité prix
        </p>
        <a href="{{ route('produit') }}" class="bg-primary text-white px-5 py-2 rounded hover:bg-blue-400 text-sm-custom">Voir plus</a>

      </div>
    </section>
    <!-- BONNES AFFAIRES DU JOUR (disposition en 2 colonnes) -->
    <section class="px-4 md:px-16 py-10 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-xl-custom md:text-2xl text-black mb-2">Les <span class="text-green">Bonnes <br/> affaires</span> du jour</h2>
                <p class="text-sm-custom text-black mb-4">
                    Une sélection des meilleurs produits, soigneusement choisis pour vous.<br>
                    Des indispensables qui simplifient et enrichissent votre quotidien !
                </p>
                <a href="{{ route('produit') }}" class="bg-primary text-white px-5 py-2 rounded hover:bg-blue-400 text-sm-custom">Voir plus</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                @foreach($bonnesAffaires as $produit)
                    <div class="bg-white border rounded-lg p-4 text-center shadow">
                        <img src="{{ asset('storage/'.$produit->image) }}" alt="Produit" class="h-24 w-full object-contain mx-auto mb-2"/>
                        <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                        @csrf
                        <button type="submit" class=" text-primary text-sm-custom  py-1 rounded hover:bg-blue-400">
                            Ajouter au panier
                        </button>
                        </form>
                        <p class="text-sm-custom text-black">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- NOUVEAUX ARRIVAGES AVEC CARROUSEL (FIDÈLE MAQUETTE) -->
    <section class="px-4 md:px-16 py-10 bg-palewhite relative">
        <h2 class="text-xl-custom md:text-2xl mb-6">
          <span class="text-prima">Nouveaux</span> Arrivages
        </h2>
        

        <!-- Flèches -->
        <button
          onclick="scrollNewArrivals('left')"
          class="hidden md:flex items-center justify-center absolute left-1 top-1/2 -translate-y-1/2 z-10 bg-white shadow px-2 py-1 rounded-full"
        >
          ◀
        </button>

        <button
          onclick="scrollNewArrivals('right')"
          class="hidden md:flex items-center justify-center absolute right-1 top-1/2 -translate-y-1/2 z-10 bg-white shadow px-2 py-1 rounded-full"
        >
          ▶
        </button>

      <!-- SLIDER -->
      <div id="newArrivalsSlider" class="flex overflow-x-auto gap-6 scroll-smooth snap-x snap-mandatory pb-2 md:pb-0 scrollbar-hide">
          @foreach($nouveauxArrivages as $produit)
              <div class="snap-start min-w-[220px] bg-white border rounded-lg p-4 text-center shadow">
                  <p class="text-xs-custom text-gray-500 mb-1">{{ $produit->categorie->nom ?? '' }}</p>
                  <p class="text-sm-custom text-primary truncate mb-1">{{ $produit->nom }}</p>
                  <img src="{{ asset('storage/'.$produit->image) }}" alt="{{ $produit->nom }}" class="h-28 w-full object-contain mx-auto mb-2" />
                  <div class="flex justify-center items-center gap-2 mb-3">
                      @if($produit->prix_promo)
                          <p class="text-sm-custom line-through text-gray-400">XOF {{ number_format($produit->prix,0,',',' ') }}</p>
                          <p class="text-base-custom text-primary">XOF {{ number_format($produit->prix_promo,0,',',' ') }}</p>
                      @else
                          <p class="text-base-custom text-primary">XOF {{ number_format($produit->prix,0,',',' ') }}</p>
                      @endif
                  </div>
                <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-primary text-white text-sm-custom px-4 py-1 rounded hover:bg-blue-400">
                    Ajouter au panier
                </button>
                </form>
              </div>
          @endforeach
      </div>


    </section>
        <!-- NOS PRODUITS COMPLET -->
    <section class="px-4 md:px-16 py-10 bg-white">
        <!-- TITRE -->
        <h2 class="text-xl-custom md:text-2xl mb-6">
            <span class="text-prima">Nos</span> Produits
        </h2>

        <!-- ONGLET + FLÈCHES EN LIGNE -->
        <div class="flex flex-wrap items-center justify-center gap-4 mb-6">
            <div class="flex gap-6 text-sm-custom font-medium">
                <button class="tab-link active-tab text-primary border-b-2 border-primary pb-1"
                    onclick="showTab('materiel', event)">
                    Matériel informatique
                </button>
                <button class="tab-link text-gray-600 hover:text-primary"
                    onclick="showTab('ordinateurs', event)">
                    Ordinateurs
                </button>
                <button class="tab-link text-gray-600 hover:text-primary"
                    onclick="showTab('smartphones', event)">
                    Smartphones
                </button>
            </div>
            <div class="flex gap-2">
                <button class="text-gray-500 hover:text-primary" onclick="prevTab()">◀</button>
                <button class="text-gray-500 hover:text-primary" onclick="nextTab()">▶</button>
            </div>
        </div>

        <!-- CONTENU -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- CARTE PROMO GAUCHE – EXACTEMENT COMME LA MAQUETTE -->
            <div class="col-span-1">
                <div class="min-h-[460px] h-full bg-white overflow-hidden flex flex-col justify-between">
                    <!-- Image de fond (ne contient aucun texte ajouté en HTML) -->
                    <div class="h-[260px] w-full bg-cover bg-center"
                        style="background-image: url('{{ asset('assets/image/Group 74.png') }}')"></div>
                    <!-- Contenu produit en bas -->
                    <div class="p-4 flex flex-col gap-3">
                        <div>
                            <p class="text-sm-custom text-black mb-1">Console Nintendo Switch</p>
                            <div class="flex justify-start items-center gap-2 mb-2">
                                <p class="text-base-custom text-red-500">XOF 65,208</p>
                                <p class="text-base-custom line-through text-gray-400">XOF 66,000</p>
                            </div>
                        </div>
                        <div class="flex justify-between text-xs-custom text-prima">
                            <span>Déjà vendus : <span class="text-prima font-semibold">6</span></span>
                            <span>Disponibles : <span class="text-prima font-semibold">30</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRODUITS ONGLET -->
            <div class="col-span-1 md:col-span-3">
                <!-- MATÉRIEL INFORMATIQUE -->
                <div id="tab-materiel" class="tab-content grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @forelse($materielInformatique as $produit)
                        <div class="bg-white border rounded-lg p-4 text-center shadow">
                            <p class="text-xs-custom text-gray-500 mb-1">{{ $produit->categorie->nom ?? '' }}</p>
                            <p class="text-sm-custom text-primary truncate mb-1">{{ $produit->nom }}</p>
                            <img src="{{ asset('storage/'.$produit->image) }}" class="h-24 w-full object-contain mx-auto mb-2" />
                            <div class="flex justify-center items-center gap-2 mb-3">
                                <p class="text-base-custom text-primary">XOF {{ number_format($produit->prix,0,',',' ') }}</p>
                            </div>
                            <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-primary text-white text-sm-custom px-4 py-1 rounded hover:bg-blue-400">
                                Ajouter au panier
                            </button>
                            </form>
                        </div>
                    @empty
                        <p class="col-span-3 text-center text-gray-400">Aucun produit pour cette catégorie.</p>
                    @endforelse
                </div>
                <!-- ORDINATEURS -->
                <div id="tab-ordinateurs" class="tab-content hidden grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @forelse($ordinateurs as $produit)
                        <div class="bg-white border rounded-lg p-4 text-center shadow">
                            <p class="text-xs-custom text-gray-500 mb-1">{{ $produit->categorie->nom ?? '' }}</p>
                            <p class="text-sm-custom text-primary truncate mb-1">{{ $produit->nom }}</p>
                            <img src="{{ asset('storage/'.$produit->image) }}" class="h-24 w-full object-contain mx-auto mb-2" />
                            <div class="flex justify-center items-center gap-2 mb-3">
                                <p class="text-base-custom text-primary">XOF {{ number_format($produit->prix,0,',',' ') }}</p>
                            </div>
                            <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-primary text-white text-sm-custom px-4 py-1 rounded hover:bg-blue-400">
                                Ajouter au panier
                            </button>
                            </form>
                        </div>
                    @empty
                        <p class="col-span-3 text-center text-gray-400">Aucun produit pour cette catégorie.</p>
                    @endforelse
                </div>
                <!-- SMARTPHONES -->
                <div id="tab-smartphones" class="tab-content hidden grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @forelse($smartphones as $produit)
                        <div class="bg-white border rounded-lg p-4 text-center shadow">
                            <p class="text-xs-custom text-gray-500 mb-1">{{ $produit->categorie->nom ?? '' }}</p>
                            <p class="text-sm-custom text-primary truncate mb-1">{{ $produit->nom }}</p>
                            <img src="{{ asset('storage/'.$produit->image) }}" class="h-24 w-full object-contain mx-auto mb-2" />
                            <div class="flex justify-center items-center gap-2 mb-3">
                                <p class="text-base-custom text-primary">XOF {{ number_format($produit->prix,0,',',' ') }}</p>
                            </div>
                            <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-primary text-white text-sm-custom px-4 py-1 rounded hover:bg-blue-400">
                                Ajouter au panier
                            </button>
                            </form>
                        </div>
                    @empty
                        <p class="col-span-3 text-center text-gray-400">Aucun produit pour cette catégorie.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 md:px-16 py-10 bg-palewhite">
      <!-- TITRE -->
      <h2 class="text-sm-custom md:text-2xl  mb-6">
        <span class="text-prima">Promo</span> de la semaine
      </h2>

      <!-- GRILLE DES PRODUITS -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
          @forelse($promos as $produit)
              <div class="bg-white border rounded-lg shadow p-4">
                  <div class="relative">
                      <img src="{{ asset('storage/'.$produit->image) }}"
                          alt="{{ $produit->nom }}"
                          class="w-full h-52 object-contain" />
                  </div>
                  <div class="mt-3 space-y-1 text-left">
                      <p class="text-sm-custom text-gray-800">{{ $produit->nom }}</p>
                      <div class="flex items-center gap-2">
                          @if($produit->prix_promo)
                              <p class="text-base-custom text-red-500">
                                  XOF {{ number_format($produit->prix_promo,0,',',' ') }}
                              </p>
                              <p class="text-base-custom line-through text-gray-400">
                                  XOF {{ number_format($produit->prix,0,',',' ') }}
                              </p>
                          @else
                              <p class="text-base-custom text-red-500">
                                  XOF {{ number_format($produit->prix,0,',',' ') }}
                              </p>
                          @endif
                      </div>
                      <div class="flex justify-between text-sm-custom text-black mt-1">
                          <span>
                              Déjà vendus :
                              <span class="text-gray-500 font-semibold">
                                  {{ $produit->vendus ?? '-' }}
                              </span>
                          </span>
                          <span>
                              Disponibles :
                              <span class="text-gray-500 font-semibold">
                                  {{ $produit->stock }}
                              </span>
                          </span>
                      </div>
                  </div>
              </div>
          @empty
              <div class="col-span-3 text-center text-gray-400">
                  Aucun produit en promo pour le moment.
              </div>
          @endforelse
      </div>

    </section>
    <!-- SECTION PARTENAIRES -->
    <section class="bg-white py-10 px-4 md:px-16">
      <p class="text-base-custom text-gray-600 text-center mb-8">
        Des marques leaders pour vous garantir excellence et fiabilité.
      </p>

      <!-- GRILLE RESPONSIVE -->
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 place-items-center">
        <img src="assets/image/image_partenariat/col-md-2-1.png" alt="Stripe" class="h-10 w-auto object-contain" />
        <img src="assets/image/image_partenariat/col-md-2.png" alt="AWS" class="h-10 w-auto object-contain" />
        <img src="assets/image/image_partenariat/col-md-2-2.png" alt="Reddit" class="h-10 w-auto object-contain" />
        <img src="assets/image/image_partenariat/col-md-2-3.png" alt="Lyft" class="h-10 w-auto object-contain" />
        <img src="assets/image/image_partenariat/col-md-2-4.png" alt="Hooli" class="h-10 w-auto object-contain" />
        <img src="assets/image/image_partenariat/col-md-2-5.png" alt="Hooli" class="h-10 w-auto object-contain" />
      </div>
    </section>
    @endsection






