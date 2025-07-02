<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\CommandeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\PanierController;


// Accueil, Contact, À propos
Route::view('/', 'index')->name('index');
Route::view('/contact', 'contact')->name('contact');
Route::view('/a-propos', 'a_propos')->name('a_propos');
Route::view('/panier', 'panier')->name('panier');
// Route::view('/produit', 'produit')->name('produit');
// Route::view('/produit_details', 'produit_details')->name('produit_details');
// Page d'accueil
Route::get('/', [App\Http\Controllers\AccueilController::class, 'index'])->name('index');

// Liste complète des produits
Route::get('/produits', [App\Http\Controllers\ProductController::class, 'index'])->name('produit');

// Détail d’un produit
Route::get('/produit/{produit}', [App\Http\Controllers\ProductController::class, 'show'])->name('produit_details');


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
    Route::get('/produits', [ProduitController::class, 'produit'])->name('produits.index');
    Route::post('/ajouter', [ProduitController::class, 'store'])->name('store');
    Route::get('/{produit}/edit', [ProduitController::class, 'edit'])->name('edit');
    Route::put('/{produit}', [ProduitController::class, 'update'])->name('update');
    Route::delete('/{produit}', [ProduitController::class, 'destroy'])->name('destroy');
});

Route::get('/panier', [PanierController::class, 'index'])->name('panier');
Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::post('/panier/modifier/{id}', [PanierController::class, 'modifier'])->name('panier.modifier');
Route::post('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');
