<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscription - Trendify</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Century Gothic"', 'sans-serif'],
          },
          fontSize: {
            'xs-custom': '12px',
            'sm-custom': '14px',
            'base-custom': '16px',
            'lg-custom': '18px',
            'xl-custom': '22px',
            '2xl-custom': '26px',
            '3xl-custom': '32px',
            '4xl-custom': '38px',
          },
          colors: {
            black: '#000000',
            primary: '#14B1F0',
            prima: "#15ADB7",
            accent: '#FF9900',
            green_p: '#34A853',
            palewhite: '#F8F6F6',
            blueciel: '#4285F4',
          },
        }
      }
    }
  </script>
</head>
<body class="bg-palewhite text-black font-sans">
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
            <a href="" class="hover:text-blue-500 nav-link">À propos</a>
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

<section class="px-4 md:px-16 py-12 bg-white font-sans">
  <!-- ÉTAPES -->
 <div class="flex items-center gap-12 text-lg-custom font-bold mb-8" id="checkout-steps">
    <a href="livraison.html" class="text-xl">←</a>
    <span class="step" data-step="address">Adresse</span>
    <span class="text-gray-400">></span>
    <span class="step" data-step="shipping">Livraison</span>
    <span class="text-gray-400">></span>
    <span class="step active-step" data-step="payment">Paiement</span>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Méthodes de paiement -->
    <div class="lg:col-span-2 space-y-6">
      <p class="text-sm-custom font-semibold">Méthode de paiement</p>

      <!-- Carte 1 -->
      <label class="flex justify-between items-center border rounded px-4 py-3 cursor-pointer hover:border-green_p">
        <div class="flex items-center gap-4">
          <input type="radio" name="paiement" checked class="accent-green_p" />
          <div class="flex items-center gap-2">
            <img src="assets/image/visa.png" alt="Visa" class="w-6 h-4" />
            <span class="text-sm-custom font-semibold">•••• 6754</span>
            <span class="text-sm-custom text-gray-500">Expire 06/2021</span>
          </div>
        </div>
        <a href="#" class="text-sm-custom text-red-500 hover:underline">Supprimer</a>
      </label>

      <!-- Carte 2 -->
      <label class="flex justify-between items-center border rounded px-4 py-3 cursor-pointer hover:border-green_p">
        <div class="flex items-center gap-4">
          <input type="radio" name="paiement" class="accent-green_p" />
          <div class="flex items-center gap-2">
            <img src="assets/image/mastercard_paiement.png" alt="MasterCard" class="w-6 h-4" />
            <span class="text-sm-custom font-semibold">•••• 5643</span>
            <span class="text-sm-custom text-gray-500">Expire 11/2025</span>
          </div>
        </div>
        <a href="#" class="text-sm-custom text-red-500 hover:underline">Supprimer</a>
      </label>

      <!-- Ajouter une carte -->
      <div>
        <a href="#" class="flex items-center gap-2 text-sm-custom text-green_p font-medium">
          <span class="text-xl">+</span> Ajouter une méthode de paiement
        </a>
      </div>
      <button class="mt-6 px-6 py-2 border border-red-300 bg-red-600 text-white rounded text-sm-custom hover:bg-red-400 hover:text-white transition"><a href="produit.html">Annuler</a></button>
    </div>

    <!-- Récapitulatif commande -->
    <div class="border rounded p-6 shadow-sm">
      <h3 class="text-base-custom font-semibold mb-4">Récapitulatif de la commande</h3>
      <div class="space-y-8 text-sm-custom">
        <div class="flex justify-between">
          <span>Prix</span>
          <span>319,98 $</span>
        </div>
        <div class="flex justify-between">
          <span>Remise</span>
          <span>-31,90 $</span>
        </div>
        <div class="flex justify-between">
          <span>Livraison</span>
          <span class="text-green-600">Gratuite</span>
        </div>
        <div class="flex justify-between">
          <span>Coupon appliqué</span>
          <span>0,00 $</span>
        </div>
        <div class="border-t pt-2 flex justify-between font-bold">
          <span>Total</span>
          <span>288,08 $</span>
        </div>
        <div class="flex justify-between items-center mt-4">
          <span class="text-xs-custom text-gray-500">Livraison estimée le</span>
          <span class="text-xs-custom font-medium">01 Février 2023</span>
        </div>
        <div class="mt-4 flex items-center border rounded px-2 py-1">
          <input type="text" placeholder="Code promo" class="flex-1 outline-none text-sm-custom px-2" />
          <button class="text-gray-500 text-xl">🏷️</button>
        </div>
        <button onclick="showPaymentSuccessModal()" class="mt-4 w-full bg-green_p text-white py-2 rounded hover:bg-green-400 text-sm-custom">Passez votre commande et payer</button>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="bg-palewhite py-10 px-4 md:px-16 text-sm-custom text-gray-600">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">
    <div>
      <h3 class="text-lg font-bold text-black mb-2">Trendify</h3>
      <p class="text-sm-custom text-black">Votre meilleure source d’accessoires informatiques : excellence, rapidité et prix justes.</p>
      <div class="flex gap-4 mt-4">
        <a href="#"><img src="assets/image/icones/facebook.png" alt="Facebook" class="h-5" /></a>
        <a href="#"><img src="assets/image/icones/instagram.png" alt="Instagram" class="h-5" /></a>
      </div>
    </div>

    <div>
      <h4 class="font-semibold text-black mb-2">ENTREPRISE</h4>
      <ul class="space-y-3 text-base-custom">
        <li><a href="#">À propos</a></li>
        <li><a href="#">Activités</a></li>
        <li><a href="#">Personnels</a></li>
      </ul>
    </div>

    <div>
      <h4 class="font-semibold text-black mb-2">AIDE</h4>
      <ul class="space-y-3 text-base-custom">
        <li><a href="#">Soutien clients</a></li>
        <li><a href="#">Détails de la livraison</a></li>
        <li><a href="#">Conditions d’achat</a></li>
      </ul>
    </div>

    <div>
      <h4 class="font-semibold text-black mb-2">FAQ</h4>
      <ul class="space-y-3 text-base-custom">
        <li><a href="#">Livraisons</a></li>
        <li><a href="#">Commandes</a></li>
        <li><a href="#">Paiements</a></li>
      </ul>
    </div>

    <div>
      <h4 class="font-semibold text-black mb-2">RESSOURCES</h4>
      <ul class="space-y-3 text-base-custom">
        <li><a href="#">Livres gratuits</a></li>
        <li><a href="#">Tutoriel achat</a></li>
        <li><a href="#">Devenir partenaire</a></li>
      </ul>
    </div>
  </div>

  <div class="mt-10 pt-4 border-t flex flex-col md:flex-row items-center justify-between gap-4 text-xs-custom text-gray-500">
    <p class="text-base-custom text-center md:text-left">Trendify © 2025, tous droits réservés</p>
    <div class="flex flex-wrap justify-center gap-4">
      <img src="assets/image/icones/visa.png" alt="Visa" class="h-10 w-auto" />
      <img src="assets/image/icones/master.png" alt="Mastercard" class="h-10 w-auto" />
      <img src="assets/image/icones/paypal.png" alt="Paypal" class="h-10 w-auto" />
      <img src="assets/image/icones/applepay.png" alt="Apple Pay" class="h-10 w-auto" />
      <img src="assets/image/icones/googlepay.png" alt="Google Pay" class="h-10 w-auto" />
    </div>
  </div>
</footer>
<!-- Modal de confirmation -->
<div id="paymentSuccessModal" class="fixed inset-0 bg-black bg-opacity-40 z-100 flex items-center justify-center hidden">
  <div class="bg-white rounded-lg text-center px-6 py-8 w-[90%] max-w-md font-sans">
    <h1 class="text-2xl-custom font-bold mb-4">Trendify</h1>
    <img src="assets/image/icones/icon_paiement.png" alt="Succès" class="w-20 h-20 mx-auto mb-4" />
    <p class="text-xl-custom font-bold mb-2">150,000 F CFA</p>
    <p class="text-base-custom mb-4">Paiement effectué avec succès</p>

    <button class="w-full bg-green-500 text-white rounded-full py-2 text-sm-custom mb-3 hover:bg-green-600">
      Suivre l’état de ma livraison
    </button>
    <button onclick="closePaymentModal()" class="w-full bg-rose-100 text-red-500 rounded-full py-2 text-sm-custom hover:bg-red-500 hover:text-white">
      Quitter
    </button>
    <p class="text-xs-custom text-gray-500 mt-4">Merci pour la confiance et au plaisir de vous revoir</p>
  </div>
</div>

<style>
  .step {
    color: #a0aec0;
  }
  .active-step {
    color: #000000;
  }
</style>

<script src="assets/js/paiement.js"></script>
<script src="assets/js/main.js" defer></script>

</body>
</html>
