@extends('layouts.app')
@section('title', 'Modifier le profil')
@section('content')

<section class="px-4 md:px-16 py-10 bg-white font-sans" id="profil-edit">
  <div class="flex flex-col md:flex-row gap-12">
    <!-- IMAGE + UPLOAD -->
    <div class="flex flex-col items-center gap-4">
      <img id="previewImage"
           src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('assets/image/profil_image.png') }}"
           class="w-36 h-36 object-cover rounded-full border-4 border-green-500" />
    </div>
    <!-- FORMULAIRE -->
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="flex-1 space-y-6">
      @csrf
      <div>
        <h4 class="font-bold text-base-custom mb-2">Informations de base</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nom d'utilisateur" class="border rounded px-4 py-2 w-full text-sm-custom" required />
          <input type="text" name="telephone" value="{{ old('telephone', $user->telephone) }}" placeholder="Numéro de téléphone" class="border rounded px-4 py-2 w-full text-sm-custom" />
        </div>
      </div>
      <div>
        <label class="block mb-1 text-sm-custom font-medium">Sexe</label>
        <select name="sexe" class="border rounded px-4 py-2 w-full text-sm-custom">
          <option value="">Sélectionner</option>
          <option value="Homme" {{ $user->sexe == 'Homme' ? 'selected' : '' }}>Homme</option>
          <option value="Femme" {{ $user->sexe == 'Femme' ? 'selected' : '' }}>Femme</option>
          <option value="Autre" {{ $user->sexe == 'Autre' ? 'selected' : '' }}>Autre</option>
        </select>
      </div>
      <div>
        <label class="block mb-1 text-sm-custom font-medium">Date de naissance</label>
        <input type="date" name="date_naissance" value="{{ old('date_naissance', $user->date_naissance) }}" class="border rounded px-4 py-2 w-full text-sm-custom" />
      </div>
      <div>
        <label class="block mb-1 text-sm-custom font-medium">E-mail</label>
        <input type="email" value="{{ $user->email }}" class="border rounded px-4 py-2 w-full text-sm-custom bg-gray-100" readonly />
      </div>
      <div>
        <label class="block mb-1 text-sm-custom font-medium">Photo de profil</label>
        <label class="bg-green-500 text-white py-2 px-4 rounded cursor-pointer mt-2 hover:bg-green-600 inline-block">
          Télécharger une photo
          <input type="file" name="photo" accept="image/*" class="hidden" id="photoInput">
        </label>
      </div>
      <div class="text-right">
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded text-sm-custom hover:bg-green-600">Enregistrer</button>
        <a href="{{ route('profil') }}" class="ml-4 text-gray-500 hover:underline">Annuler</a>
      </div>
    </form>
  </div>
</section>
@vite('resources/js/profil.js')
@endsection
