<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
  public function register(Request $request)
{
    // Validation (ajoute 'role')
    $request->validate([
        'email' => 'required|email|unique:users',
        'name' => 'required',
        'phone' => 'nullable',
        'password' => 'required|confirmed',
        'role' => 'required|in:client,admin'
    ]);

    // Ne laisser qu'un seul admin !
    if ($request->role === 'admin' && User::where('role', 'admin')->exists()) {
        // Sécurité côté serveur
        $role = 'client';
    } else {
        $role = $request->role;
    }

    $user = User::create([
        'email' => $request->email,
        'name' => $request->name,
        'telephone' => $request->phone,
        'password' => bcrypt($request->password),
        'role' => $role,
    ]);

    // Authentifier et rediriger
    //Auth::login($user);
    return redirect()->route('login');
}

}
