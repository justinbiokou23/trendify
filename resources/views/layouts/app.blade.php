<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon Site E-commerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- HEADER -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
            <!-- LOGO -->
            <div class="text-2xl  text-gray-900"><a href="{{ route('index') }}">Trendify</a></div>

            <!-- NAVIGATION (desktop) -->
            <nav class="hidden md:flex space-x-6 text-sm font-medium text-gray-700">
                <a href="{{ route('index') }}"
                class="nav-link {{ request()->routeIs('index') ? 'text-blue-500 font-semibold border-b-2 border-blue-500 pb-1' : 'hover:text-blue-500' }}">
                    Accueil
                </a>
                <a href="{{ route('contact') }}"
                class="nav-link {{ request()->routeIs('contact') ? 'text-blue-500 font-semibold border-b-2 border-blue-500 pb-1' : 'hover:text-blue-500' }}">
                    Contact
                </a>
                <a href="{{ route('a_propos') }}"
                class="nav-link {{ request()->routeIs('a_propos') ? 'text-blue-500 font-semibold border-b-2 border-blue-500 pb-1' : 'hover:text-blue-500' }}">
                    À propos
                </a>
                @guest
                    <a href="{{ route('login') }}"
                    class="nav-link {{ request()->routeIs('login') ? 'text-blue-500 font-semibold border-b-2 border-blue-500 pb-1' : 'hover:text-blue-500' }}">
                        Se connecter
                    </a>
                @endguest
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
    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
        {{ $cartCount ?? 0 }}
    </span>
    <div
        id="cartDropdown"
        class="hidden absolute right-0 top-10 w-64 bg-white shadow-md rounded border p-4 z-30"
    >
        <p class="font-semibold mb-2">Votre panier</p>
        <ul class="text-sm space-y-2">
        @if($cartCount > 0 && $panier && count($panier))
            @foreach($panier as $item)
                <li>
                  {{ $item['nom'] }} - {{ number_format($item['prix'], 0, ',', ' ') }} FCFA (x{{ $item['quantite'] }})
                </li>
            @endforeach
        @else
            <li>Votre panier est vide</li>
        @endif
        </ul>
        <a href="{{ route('panier') }}">
        <button class="mt-4 w-full bg-blue-500 text-white py-1 rounded hover:bg-blue-600">
            Voir le panier
        </button>
        </a>
    </div>
</div>



                <!-- Profil -->
            <div class="relative">
                <button onclick="toggleProfile()" class="text-xl">👤</button>
                <div id="profileDropdown" class="hidden absolute right-0 top-10 w-40 bg-white shadow-md rounded border text-sm z-30">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                        @else
                            <a href="{{ route('profil') }}" class="block px-4 py-2 hover:bg-gray-100">Mon profil</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Déconnexion</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-100">Se connecter</a>
                    @endauth
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
                <a href="{{ route('index') }}"
                class="block py-2 nav-link-mobile {{ request()->routeIs('index') ? 'text-blue-500 font-semibold border-b-2 border-blue-500 pb-1' : 'hover:text-blue-500' }}">
                    Accueil
                </a>
                <a href="{{ route('contact') }}"
                class="block py-2 nav-link-mobile {{ request()->routeIs('contact') ? 'text-blue-500 font-semibold border-b-2 border-blue-500 pb-1' : 'hover:text-blue-500' }}">
                    Contact
                </a>
                <a href="{{ route('a_propos') }}"
                class="block py-2 nav-link-mobile {{ request()->routeIs('a_propos') ? 'text-blue-500 font-semibold border-b-2 border-blue-500 pb-1' : 'hover:text-blue-500' }}">
                    À propos
                </a>
                 @guest
                <a href="{{ route('login') }}"
                class="block py-2 nav-link-mobile {{ request()->routeIs('login') ? 'text-blue-500 font-semibold border-b-2 border-blue-500 pb-1' : 'hover:text-blue-500' }}">
                   Se connecter
                </a>
                 @endguest
            </nav>

        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <!-- FOOTER -->
<footer class="bg-palewhite py-10 px-4 md:px-16 text-sm-custom text-gray-600">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">
        <div>
            <h3 class="text-lg font-bold text-black mb-2">Trendify</h3>
            <p class="text-sm-custom text-black">Votre meilleure source d’accessoires informatiques : excellence, rapidité et prix justes.</p>
            <div class="flex gap-4 mt-4">
                <a href="#"><img src="{{ asset('assets/image/icones/facebook.png') }}" alt="Facebook" class="h-5" /></a>
                <a href="#"><img src="{{ asset('assets/image/icones/instagram.png') }}" alt="Instagram" class="h-5" /></a>
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
            <img src="{{ asset('assets/image/icones/visa.png') }}" alt="Visa" class="h-10 w-auto" />
            <img src="{{ asset('assets/image/icones/master.png') }}" alt="Mastercard" class="h-10 w-auto" />
            <img src="{{ asset('assets/image/icones/paypal.png') }}" alt="Paypal" class="h-10 w-auto" />
            <img src="{{ asset('assets/image/icones/applepay.png') }}" alt="Apple Pay" class="h-10 w-auto" />
            <img src="{{ asset('assets/image/icones/googlepay.png') }}" alt="Google Pay" class="h-10 w-auto" />
        </div>
    </div>
</footer>

</body>
</html>
