<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;

class AdresseController extends Controller
{
    public function adresse()
    {
        $adresses = auth()->user()->adresses; // Relation User/adresses()
        return view('adresse', compact('adresses'));
    }

    public function create()
    {
        return view('adresse_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'     => 'required|max:255',
            'type'    => 'required', // DOMICILE ou BUREAU
            'adresse' => 'required',
            'contact' => 'required',
        ]);
        $data['user_id'] = auth()->id();
        Adresse::create($data);

        return redirect()->route('adresse')->with('success', 'Adresse ajoutée !');
    }

public function edit(Adresse $adresse)
{
    // $this->authorize('update', $adresse); // retire si tu n’as pas de Policy
    return view('adresse_edit', compact('adresse'));
}
public function update(Request $request, Adresse $adresse)
{
    // $this->authorize('update', $adresse);
    $data = $request->validate([
        'nom' => 'required|max:255',
        'type' => 'required',
        'adresse' => 'required',
        'contact' => 'required',
    ]);
    $adresse->update($data);
    return redirect()->route('adresse')->with('success', 'Adresse modifiée !');
}


    public function destroy(Adresse $adresse)
    {
        if ($adresse->user_id !== auth()->id()) {
            abort(403);
        }
        $adresse->delete();
        return back()->with('success', 'Adresse supprimée.');
    }


}
