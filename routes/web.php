<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\CommandeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TransactionController;

// Accueil, Contact, À propos
Route::view('/', 'index')->name('index');
Route::view('/contact', 'contact')->name('contact');
Route::view('/a-propos', 'a_propos')->name('a_propos');

// Auth (Register)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Auth (Login/Logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Profil utilisateur & Panier
Route::view('/profil', 'profil')->name('profil')->middleware('auth');
Route::view('/panier', 'panier')->name('panier');

// DASHBOARD ADMIN & ADMIN PAGES
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/commandes', [CommandeController::class, 'index'])->name('admin.commandes');
Route::get('/admin/infoclients', [ClientController::class, 'index'])->name('admin.infoclients');
Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions');

// CRUD PRODUITS (Groupe avec préfixe, propre)
Route::prefix('admin/produits')->name('admin.produits.')->middleware('auth')->group(function () {
    Route::get('/', [ProduitController::class, 'index'])->name('index');
    Route::get('/ajouter', [ProduitController::class, 'create'])->name('create');
    Route::post('/ajouter', [ProduitController::class, 'store'])->name('store');
    Route::get('/{produit}/edit', [ProduitController::class, 'edit'])->name('edit');
    Route::put('/{produit}', [ProduitController::class, 'update'])->name('update');
    Route::delete('/{produit}', [ProduitController::class, 'destroy'])->name('destroy');
});
