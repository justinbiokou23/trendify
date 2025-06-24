<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details produits</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['"Century Gothic"', "sans-serif"],
            },
            fontSize: {
              "xs-custom": "12px",
              "sm-custom": "14px",
              "base-custom": "16px",
              "lg-custom": "18px",
              "xl-custom": "22px",
              "2xl-custom": "26px",
              "3xl-custom": "32px",
              "4xl-custom": "38px",
            },
            colors: {
              black: "#000000",
              primary: "#14B1F0",
              prima: "#15ADB7",
              accent: "#FF9900",
              green: "#34A853",
              palewhite: "#F8F6F6",
              rose: "#EECFCC",
            },
          },
        },
      };
  </script>
    <style>
      /* Cache scrollbar pour tous les navigateurs */
      .scrollbar-hide::-webkit-scrollbar {
        display: none;
      }

      .scrollbar-hide {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
      }
    </style>
</head>
<body  class="bg-white  text-black font-sans">
<header class="bg-white shadow-md">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
          <!-- LOGO -->
          <div class="text-2xl  text-gray-900">Trendify</div>

          <!-- NAVIGATION (desktop) -->
          <nav
            class="hidden md:flex space-x-6 text-sm font-medium text-gray-700"
          >
            <a
              href="index.html"
              class="hover:text-blue-500 nav-link text-blue-500 font-semibold border-b-2 border-blue-500 pb-1"
              >Accueil</a
            >
            <a href="contact.html" class="hover:text-blue-500 nav-link">Contact</a>
            <a href="#" class="hover:text-blue-500 nav-link">À propos</a>
            <a href="login.html" class="hover:text-blue-500 nav-link">Se connecter</a>
          </nav>

          <!-- ACTIONS -->
          <div class="flex items-center space-x-4">
            <!-- Recherche avec icône -->
            <div class="relative hidden sm:block">
              <input
                type="text"
                id="searchInput"
                placeholder="Rechercher"
                oninput="handleSearch(this.value)"
                class="border border-gray-300 pr-10 pl-3 py-1 rounded-md text-sm focus:outline-blue-400 w-full"
              />
              <span class="absolute right-3 top-1.5 text-gray-400 text-sm"
                >🔍</span
              >
              <div
                id="searchResults"
                class="absolute top-10 left-0 w-full bg-white shadow-md border rounded-md hidden z-20"
              >
                <ul class="text-sm p-2">
                  <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                    Résultat 1
                  </li>
                  <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                    Résultat 2
                  </li>
                  <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                    Résultat 3
                  </li>
                </ul>
              </div>
            </div>

            <!-- Panier -->
            <div class="relative">
              <button onclick="toggleCart()" class="text-xl">🛒</button>
              <span
                class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full"
                >2</span
              >
              <div
                id="cartDropdown"
                class="hidden absolute right-0 top-10 w-64 bg-white shadow-md rounded border p-4 z-30"
              >
                <p class="font-semibold mb-2">Votre panier</p>
                <ul class="text-sm space-y-2">
                  <li>Produit A - XOF 30.000</li>
                  <li>Produit B - XOF 26.000</li>
                </ul>
                <button
                  class="mt-4 w-full bg-blue-500 text-white py-1 rounded hover:bg-blue-600"
                >
                  Voir le panier
                </button>
              </div>
            </div>

            <!-- Profil -->
            <div class="relative">
              <button onclick="toggleProfile()" class="text-xl">👤</button>
              <div
                id="profileDropdown"
                class="hidden absolute right-0 top-10 w-40 bg-white shadow-md rounded border text-sm z-30"
              >
                <a href="#" class="block px-4 py-2 hover:bg-gray-100"
                  >Mon profil</a
                >
                <a href="#" class="block px-4 py-2 hover:bg-gray-100"
                  >Déconnexion</a
                >
              </div>
            </div>

            <!-- Hamburger menu mobile -->
            <div class="md:hidden">
              <button onclick="toggleMobileMenu()" class="text-2xl">☰</button>
            </div>
          </div>
        </div>

        <!-- MENU mobile -->
        <nav id="mobileMenu" class="hidden md:hidden pb-4 space-y-2">
          <a
            href="#"
            class="block py-2 nav-link-mobile text-blue-500 font-semibold border-b-2 border-blue-500 pb-1"
            >Accueil</a
          >
          <a href="#" class="block py-2 nav-link-mobile">Contact</a>
          <a href="#" class="block py-2 nav-link-mobile">À propos</a>
          <a href="#" class="block py-2 nav-link-mobile">Déconnexion</a>
        </nav>
      </div>
</header>
<!-- PAGE PRODUIT - Trendify -->
<section class="px-4 md:px-12 py-10 bg-white font-sans">
  <!-- Retour -->
  <div class="mb-4">
    <a href="produit.html" class="text-sm-custom text-gray-500 hover:underline inline-flex items-center gap-1">
      <img src="assets/image/icones/retour.png" alt="Retour" class="w-4 h-4" />
      Retour
    </a>
  </div>

  <!-- Contenu principal -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-12   items-start">
    <!-- Infos produit -->
    <div>
      <h1 class="text-3xl-custom font-bold mb-2">MacBook Air 2014</h1>
      <p class="text-xl-custom font-semibold text-black mb-2">120,000 FCFA</p>
      <div class="flex items-center gap-2 mb-3">
        <div class="text-accent">★★★★☆</div>
        <p class="text-sm-custom text-gray-600">4.6 / 5.0 (556)</p>
      </div>
      <p class="text-base-custom text-black mb-4">
        Ses courbes épurées et son design soigné offrent une expérience visuelle raffinée,
        avec une conception robuste assurant une fiabilité à toute épreuve.
      </p>

      <!-- Couleurs -->
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
        <button class="bg-prima  text-white px-6 py-2 rounded text-sm-custom hover:bg-prima"><a href="pannier.html">Panier</a></button>
      </div>

      <!-- Infos livraison -->
      <ul class="text-sm-custom text-black mb-4 list-disc pl-5">
        <li>Livraison gratuite en 3–5 jours</li>
        <li>Assemblage sans outil</li>
        <li>Essai de 30 jours</li>
      </ul>

      <button class="text-sm-custom text-prima ">❤ Favoris</button>
    </div>

    <!-- Galerie produit -->
    <div class="flex flex-col items-center gap-4">
      <div class="relative w-full max-w-md">
        <img id="mainImage" src="assets/image/image_nos_produit/details_p.png"
             class="w-full max-h-[360px] object-contain rounded transition-all duration-300" alt="Produit" />

        <!-- Indicateur -->
        <div class="absolute top-3 right-4 text-xl-custom font-bold text-black">
          <span id="imageIndex">01</span> / 04
        </div>

        <!-- Flèches -->
        <div class="absolute top-12 right-4 flex gap-12">
          <img src="assets/image/icones/fleche_gauche.png" alt="Précédent" class="cursor-pointer" onclick="prevImage()" />
          <img src="assets/image/icones/fleche_droite.png" alt="Suivant" class="cursor-pointer" onclick="nextImage()" />
        </div>
      </div>

      <!-- Miniatures -->
      <div class="flex gap-3 mt-2">
        <img src="assets/image/image_nos_produit/details_p.png" class="thumbnail w-16 h-16 object-cover border border-green cursor-pointer"
             onclick="changeImage(0)" />
        <img src="assets/image/image_nos_produit/details_p1.png" class="thumbnail w-16 h-16 object-cover border cursor-pointer"
             onclick="changeImage(1)" />
        <img src="assets/image/image_nos_produit/details_p2.png" class="thumbnail w-16 h-16 object-cover border cursor-pointer"
             onclick="changeImage(2)" />
        <img src="assets/image/image_nos_produit/details_p3.png" class="thumbnail w-16 h-16 object-cover border cursor-pointer"
             onclick="changeImage(3)" />
      </div>
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
    <!-- Produit 1 -->
    <div class="rounded-lg overflow-hidden text-left">
      <img src="assets/image/bonne1.png" alt="Produit 1" class="mb-2 w-auto h-48 object-contain rounded" />
      <p class="text-sm-custom font-semibold">Polo avec bordures contrastées</p>
      <div class="flex items-center gap-1 text-sm-custom text-yellow-400 mb-1">
        <span>★★★★☆</span>
        <span class="text-gray-600">4.0/5</span>
      </div>
      <p class="text-sm-custom text-black font-semibold">
        212 $ <span class="line-through text-gray-400 text-xs-custom">242 $</span>
      </p>
    </div>

    <!-- Produit 2 -->
    <div class="rounded-lg overflow-hidden text-left">
      <img src="assets/image/aimer1.png" alt="Produit 2" class="mb-2 w-auto h-48 object-contain rounded" />
      <p class="text-sm-custom font-semibold">T-shirt graphique dégradé</p>
      <div class="flex items-center gap-1 text-sm-custom text-yellow-400 mb-1">
        <span>★★★☆☆</span>
        <span class="text-gray-600">3.5/5</span>
      </div>
      <p class="text-sm-custom text-black font-semibold">145 $</p>
    </div>

    <!-- Produit 3 -->
    <div class="rounded-lg overflow-hidden text-left">
      <img src="assets/image/aimer1.png" alt="Produit 3" class="mb-2 w-auto h-48 object-contain rounded" />
      <p class="text-sm-custom font-semibold">Polo avec détails de liserés</p>
      <div class="flex items-center gap-1 text-sm-custom text-yellow-400 mb-1">
        <span>★★★★☆</span>
        <span class="text-gray-600">4.5/5</span>
      </div>
      <p class="text-sm-custom text-black font-semibold">180 $</p>
    </div>

    <!-- Produit 4 -->
    <div class="rounded-lg overflow-hidden text-left">
      <img src="assets/image/aimer1.png" alt="Produit 4" class="mb-2 w-auto h-48 object-contain rounded" />
      <p class="text-sm-custom font-semibold">T-shirt rayé noir</p>
      <div class="flex items-center gap-1 text-sm-custom text-yellow-400 mb-1">
        <span>★★★★★</span>
        <span class="text-gray-600">5.0/5</span>
      </div>
      <p class="text-sm-custom text-black font-semibold">
        120 $ <span class="line-through text-gray-400 text-xs-custom">150 $</span>
      </p>
    </div>
  </div>
</section>
<!-- FOOTER -->
<footer class="bg-palewhite py-10 px-4 md:px-16 text-sm-custom text-gray-600">
  <!-- GRILLE PRINCIPALE -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">

    <!-- LOGO + DESCRIPTION -->
    <div>
      <h3 class="text-lg font-bold text-black mb-2">Trendify</h3>
      <p class="text-sm-custom text-black">
        Votre meilleure source d’accessoires informatiques:
        excellence, rapidité et prix justes.
      </p>
      <div class="flex gap-4 mt-4">
        <a href="#"><img src="assets/image/icones/facebook.png" alt="Facebook" class="h-5" /></a>
        <a href="#"><img src="assets/image/icones/instagram.png" alt="Instagram" class="h-5" /></a>
      </div>
    </div>

    <!-- ENTREPRISE -->
    <div>
      <h4 class="font-semibold text-black mb-2">ENTREPRISE</h4>
      <ul class="space-y-3 text-base-custom">
        <li><a href="#">À propos</a></li>
        <li><a href="#">Activités</a></li>
        <li><a href="#">Personnels</a></li>
      </ul>
    </div>

    <!-- AIDE -->
    <div>
      <h4 class="font-semibold text-black mb-2">AIDE</h4>
      <ul class="space-y-3 text-base-custom">
        <li><a href="#">Soutien clients</a></li>
        <li><a href="#">Détails de la livraison</a></li>
        <li><a href="#">Conditions d’achat</a></li>
      </ul>
    </div>

    <!-- FAQ -->
    <div>
      <h4 class="font-semibold text-black mb-2">FAQ</h4>
      <ul class="space-y-3 text-base-custom">
        <li><a href="#">Livraisons</a></li>
        <li><a href="#">Commandes</a></li>
        <li><a href="#">Paiements</a></li>
      </ul>
    </div>

    <!-- RESSOURCES -->
    <div>
      <h4 class="font-semibold text-black mb-2">RESSOURCES</h4>
      <ul class="space-y-3 text-base-custom">
        <li><a href="#">Livres gratuits</a></li>
        <li><a href="#">Tutoriel achat</a></li>
        <li><a href="#">Devenir partenaire</a></li>
      </ul>
    </div>
  </div>

  <!-- LIGNE BAS DE PAGE -->
  <div class="mt-10 pt-4 border-t flex flex-col md:flex-row items-center justify-between gap-4 text-xs-custom text-gray-500">
    <p class="text-base-custom text-center md:text-left">
      Trendify © 2025, tous droits réservés
    </p>
    <div class="flex flex-wrap justify-center gap-4">
      <img src="assets/image/icones/visa.png" alt="Visa" class="h-10 w-auto" />
      <img src="assets/image/icones/master.png" alt="Mastercard" class="h-10 w-auto" />
      <img src="assets/image/icones/paypal.png" alt="Paypal" class="h-10 w-auto" />
      <img src="assets/image/icones/applepay.png" alt="Apple Pay" class="h-10 w-auto" />
      <img src="assets/image/icones/googlepay.png" alt="Google Pay" class="h-10 w-auto" />
    </div>
  </div>
</footer>
</body>
<script src="assets/js/details_produit.js"></script>

</html>