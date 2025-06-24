<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produits - Trendify</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Century Gothic"', 'sans-serif'],
          },
          colors: {
            primary: '#14B1F0',
            greenCustom: '#21BF73',
          },
        },
      },
    };
  </script>
</head>
<body class="bg-white font-sans">
<header class="bg-white shadow">
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
      <label><input type="checkbox"> Quotidien</label><br>
      <label><input type="checkbox"> Maison</label><br>
      <label><input type="checkbox"> Cuisine</label>
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

  <!-- GRILLE PRODUITS (exemples statiques) -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
      <img src="assets/image/image_nos_produit/CUOnJSc6xg_2048x2048 1.png" class="w-full h-40 object-cover rounded mb-3" />
      <h3 class="text-sm font-medium mb-1">Skinny Fit Jeans</h3>
      <div class="flex items-center text-yellow-400 text-sm mb-1">
        ★★★★☆ <span class="ml-2 text-gray-500">4.3/5</span>
      </div>
      <div class="text-sm">
        <span class="font-bold">500 XOF</span>
        <span class="line-through text-gray-400 ml-2">700 XOF</span>
        
      </div>
    </div>
    <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
      <img src="assets/image/image_nos_produit/CUOnJSc6xg_2048x2048 1-1.png" class="w-full h-40 object-cover rounded mb-3" />
      <h3 class="text-sm font-medium mb-1">Skinny Fit Jeans</h3>
      <div class="flex items-center text-yellow-400 text-sm mb-1">
        ★★★★☆ <span class="ml-2 text-gray-500">4.3/5</span>
      </div>
      <div class="text-sm">
        <span class="font-bold">500 XOF</span>
        <span class="line-through text-gray-400 ml-2">700 XOF</span>
        
      </div>
    </div>
    <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
      <img src="assets/image/image_nos_produit/CUOnJSc6xg_2048x2048 1-2.png" class="w-full h-40 object-cover rounded mb-3" />
      <h3 class="text-sm font-medium mb-1">Skinny Fit Jeans</h3>
      <div class="flex items-center text-yellow-400 text-sm mb-1">
        ★★★★☆ <span class="ml-2 text-gray-500">4.3/5</span>
      </div>
      <div class="text-sm">
        <span class="font-bold">500 XOF</span>
        <span class="line-through text-gray-400 ml-2">700 XOF</span>
        
      </div>
    </div>
    <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
      <img src="assets/image/image_nos_produit/CUOnJSc6xg_2048x2048 1-3.png" class="w-full h-40 object-cover rounded mb-3" />
      <h3 class="text-sm font-medium mb-1">Skinny Fit Jeans</h3>
      <div class="flex items-center text-yellow-400 text-sm mb-1">
        ★★★★☆ <span class="ml-2 text-gray-500">4.3/5</span>
      </div>
      <div class="text-sm">
        <span class="font-bold">500 XOF</span>
        <span class="line-through text-gray-400 ml-2">700 XOF</span>
        
      </div>
    </div>
    <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
      <a href="produit_details.html"><img src="assets/image/image_nos_produit/CUOnJSc6xg_2048x2048 1-4.png" class="w-full h-40 object-cover rounded mb-3" /></a>
      <h3 class="text-sm font-medium mb-1">Skinny Fit Jeans</h3>
      <div class="flex items-center text-yellow-400 text-sm mb-1">
        ★★★★☆ <span class="ml-2 text-gray-500">4.3/5</span>
      </div>
      <div class="text-sm">
        <span class="font-bold">500 XOF</span>
        <span class="line-through text-gray-400 ml-2">700 XOF</span>
        
      </div>
    </div>
    <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
      <img src="assets/image/image_nos_produit/CUOnJSc6xg_2048x2048 1-5.png" class="w-full h-40 object-cover rounded mb-3" />
      <h3 class="text-sm font-medium mb-1">Skinny Fit Jeans</h3>
      <div class="flex items-center text-yellow-400 text-sm mb-1">
        ★★★★☆ <span class="ml-2 text-gray-500">4.3/5</span>
      </div>
      <div class="text-sm">
        <span class="font-bold">500 XOF</span>
        <span class="line-through text-gray-400 ml-2">700 XOF</span>
        
      </div>
    </div>

    <!-- Duplique ce bloc autant que nécessaire -->
  </div>
</section>
</div>
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

<script src="assets/js/main.js" defer></script>
</body>
</html>
