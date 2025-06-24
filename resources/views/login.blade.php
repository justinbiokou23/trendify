@extends('layouts.app')

@section('title', 'Se connecter')
@section('content')
<section class="min-h-screen flex items-center justify-center px-4 md:px-0 bg-cover bg-center" style="background-image: url('assets/image/font_connexion.png');">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-8 space-y-6">
    <div class="text-center">
      <p class="text-base-custom font-bold text-black">Bienvenue sur <span class="text-green font-bold">Trendify</span></p>
      <h1 class="text-2xl font-bold text-center my-4 text-black mb-4">Se connecter</h1>

      <!-- Connexion sociale -->
      <div class="flex justify-center gap-3 mb-4">
        <button type="button" class="bg-blue-100 text-sm-custom px-3 py-1 rounded flex items-center text-blueciel gap-1">
          <img src="assets/image/google.png" alt="Google" class="w-4 h-4" />
          Se connecter avec Google
        </button>
        <button type="button"><img src="assets/image/faccebook.png" alt="Facebook" class="w-6 h-6" /></button>
      </div>
    </div>

    <!-- Formulaire -->
    <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
      @csrf

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm-custom text-start text-black mb-1">Saisissez votre adresse e-mail</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm-custom focus:outline-blueciel" placeholder="Nom d'utilisateur ou adresse électronique" />
        @error('email')
          <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
      </div>

      <!-- Mot de passe -->
      <div>
        <label for="password" class="block text-sm-custom text-black text-start mb-1">Entrez votre mot de passe</label>
        <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm-custom focus:outline-blueciel" placeholder="Mot de passe" />
        @error('password')
          <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <!-- Ligne "me garder connecté" + lien -->
        <div class="flex justify-between items-center my-2">
          <label class="flex items-center gap-2 text-xs-custom text-gray-500">
            <input type="checkbox" id="remember" name="remember" class="h-4 w-4" />
            Me garder connecté
          </label>
          <a href="#" class="text-xs-custom text-blueciel hover:underline">Mot de passe oublié ?</a>
        </div>
      </div>

      <!-- Bouton -->
      <button type="submit" class="w-full bg-green_p text-white rounded py-2 font-semibold hover:bg-green-600 transition">
        Se connecter
      </button>
    </form>

    <!-- Inscription -->
    <p class="text-sm-custom text-center">
      Vous n'avez pas encore de compte ?
      <a href="{{ route('register') }}" class="text-bluecieal hover:underline">S'inscrire</a>
    </p>
  </div>
</section>
@endsection
