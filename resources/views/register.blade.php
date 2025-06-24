@extends('layouts.app')

@section('title', 'inscription')
@section('content')

<!-- SECTION INSCRIPTION -->
<section class="min-h-screen flex items-center justify-center px-4 bg-cover bg-center" style="background-image: url('assets/image/font_connexion.png');">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-8 space-y-6">
    <div class="text-center">
      <p class="text-base-custom font-bold text-black">Bienvenue sur <span class="text-green">Trendify</span></p>
      <h1 class="text-2xl font-bold text-black my-2">Inscrivez vous</h1>
    </div>

    {{-- AFFICHAGE DES ERREURS --}}
    @if ($errors->any())
      <div class="mb-4 text-red-500 text-sm">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-4 text-sm-custom">
      @csrf

      <div>
        <label for="email" class="block text-start text-black mb-1">Saisissez votre adresse e-mail</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blueciel" placeholder="Entrez votre adresse mail" required />
      </div>

      <div class="flex gap-2">
        <div class="w-1/2">
          <label for="username" class="block text-start text-black mb-1">Nom de l'utilisateur</label>
          <input type="text" id="username" name="name" value="{{ old('name') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blueciel" placeholder="Nom de l'utilisateur" required />
        </div>
        <div class="w-1/2">
          <label for="phone" class="block text-start text-black mb-1">Numéro de téléphone</label>
          <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blueciel" placeholder="Numéro de téléphone" />
        </div>
      </div>

      <div>
        <label for="password" class="block text-start text-black mb-1">Entrez votre mot de passe</label>
        <input type="password" id="password" name="password"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blueciel" placeholder="Mot de passe" required />
      </div>

      <div>
        <label for="confirm-password" class="block text-start text-black mb-1">Répétez votre mot de passe</label>
        <input type="password" id="confirm-password" name="password_confirmation"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blueciel" placeholder="Mot de passe" required />
      </div>
      <div>
          <label for="role" class="block text-start text-black mb-1">Inscription en tant que</label>
          <select id="role" name="role"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blueciel" required>
              <option value="client" selected>Client</option>
              @if(\App\Models\User::where('role', 'admin')->count() == 0)
                  <option value="admin">Administrateur</option>
              @endif
          </select>
      </div>


      <button type="submit" class="w-full bg-green_p text-white rounded py-2 font-semibold hover:bg-green-600 transition">S'inscrire</button>
    </form>

    <p class="text-sm-custom text-center">
      Vous avez déjà un compte ?
      <a href="{{ route('login') }}"
         class="text-bluecieal hover:underline
         {{ request()->routeIs('login') ? 'font-bold border-b-2' : '' }}">
        Se connecter
      </a>
    </p>
  </div>
</section>
@endsection
