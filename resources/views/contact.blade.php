@extends('layouts.app')

@section('title', 'Contact')
@section('content')
    <div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row">
      
      <!-- Partie gauche : Infos de contact -->
      <div class="w-full md:w-1/3 bg-greenCustom text-white p-8">
        <h2 class="text-2xl font-bold mb-12">Informations de contact</h2>
        <div class="space-y-4 text-sm">
          <div class="flex items-center gap-2">
            <img src="assets/image/bxs_phone-call.png" alt="téléphone" class="w-4 h-4" />
            <span>+229 015677589</span>
          </div>
          <div class="flex items-center gap-2">
            <img src="assets/image/ic_sharp-email.png" alt="email" class="w-4 h-4" />
            <span>ecommerce@agence.com</span>
          </div>
          <div class="flex items-center gap-2">
            <img src="assets/image/carbon_location-filled.png" alt="adresse" class="w-4 h-4" />
            <span>Cotonou, Bénin</span>
          </div>
        </div>
      </div>

      <!-- Partie droite : Formulaire -->
      <div class="w-full md:w-2/3 p-8 bg-white">
        <form class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Nom</label>
              <input type="text" class="mt-1 w-full border-b border-gray-300 focus:outline-none" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Prénom</label>
              <input type="text" class="mt-1 w-full border-b border-gray-300 focus:outline-none" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" class="mt-1 w-full border-b border-gray-300 focus:outline-none" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">N° téléphone</label>
              <input type="tel" class="mt-1 w-full border-b border-gray-300 focus:outline-none" placeholder="Indicatif" />
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Sélectionner le sujet ?</label>
            <div class="flex flex-wrap gap-6 text-sm">
              <label class="flex items-center gap-1">
                <input type="radio" name="sujet" class="accent-greenCustom" checked /> Demande
              </label>
              <label class="flex items-center gap-1">
                <input type="radio" name="sujet" class="accent-greenCustom" /> Information
              </label>
              <label class="flex items-center gap-1">
                <input type="radio" name="sujet" class="accent-greenCustom" /> Livraison
              </label>
              <label class="flex items-center gap-1">
                <input type="radio" name="sujet" class="accent-greenCustom" /> Réclamation
              </label>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Message</label>
            <textarea class="mt-1 w-full border-b border-gray-300 focus:outline-none h-24 resize-none" placeholder="Rédigez votre message..."></textarea>
          </div>

          <!-- Bouton aligné à droite -->
          <div class="flex justify-end">
            <button type="submit" class="bg-greenCustom text-white px-6 py-2 rounded hover:bg-green-600 transition">
              Envoyer
            </button>
          </div>
        </form>
      </div>

    </div>
    </div>
@endsection
 
