<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Affiche la page de profil
    public function show()
    {
        $user = Auth::user();
        $profilComplet = $user->photo && $user->sexe && $user->date_naissance;
        return view('profil', compact('user', 'profilComplet'));
    }

    // Affiche le formulaire d'édition
    public function edit()
    {
        $user = Auth::user();
        return view('profil_edit', compact('user'));
    }

    // Mise à jour
    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:30',
            'sexe' => 'nullable|string|max:10',
            'date_naissance' => 'nullable|date',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Supprime l'ancienne si existante
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            // Stocke la nouvelle photo
            $data['photo'] = $request->file('photo')->store('profils', 'public');
        }

        $user->update($data);

        return redirect()->route('profil')->with('profil_updated', true);
    }
}
