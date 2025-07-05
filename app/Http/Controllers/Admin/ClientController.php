<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ClientController extends Controller
{
    // Page liste
    public function index()
    {
        // On prend que les clients (pas admin)
        $clients = User::where('role', 'client')->orderBy('id', 'desc')->get();
        return view('admin.clients.index', compact('clients'));
    }

    // Page détail
    public function show(User $user)
    {
        // Tu pourras charger ici les commandes si tu veux
        // $orders = $user->orders; // Si relation OK
        return view('admin.infoclients', compact('user'));
    }
}
