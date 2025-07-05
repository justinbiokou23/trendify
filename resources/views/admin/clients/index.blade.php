@extends('layouts.app')
@section('title', 'Liste des clients')
@section('content')

<section class="px-4 md:px-16 py-10 bg-white my-7 font-sans">
  <div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('assets/image/icones/fleche_client.png') }}" alt="Retour" class="w-8 h-8 cursor-pointer" />
    </a>
  <h1 class="text-2xl font-bold mb-6">Liste des clients</h1>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-sm-custom border-t">
      <thead class="bg-gray-100 text-left">
        <tr>
          <th class="py-2 px-3">ID</th>
          <th class="py-2 px-3">Nom</th>
          <th class="py-2 px-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clients as $client)
          <tr class="border-b hover:bg-gray-50 transition">
            <td class="px-3 py-2 font-semibold">{{ $client->id }}</td>
            <td class="px-3">{{ $client->name }}</td>
            <td class="px-3">
              <a href="{{ route('admin.infoclients', $client->id) }}"
                 class="text-blue-500 hover:underline">Voir info</a>
            </td>
          </tr>
        @endforeach
        @if($clients->isEmpty())
          <tr>
            <td colspan="3" class="py-4 text-gray-400 text-center">Aucun client trouvé</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</section>
@endsection
