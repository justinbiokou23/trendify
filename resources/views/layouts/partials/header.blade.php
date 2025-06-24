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
                <a href="profil.html" class="block px-4 py-2 hover:bg-gray-100"
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