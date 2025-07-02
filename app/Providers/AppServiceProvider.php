<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

public function boot(): void
{
   // AppServiceProvider, boot() — ou dans ton contrôleur si tu préfères
View::composer('*', function ($view) {
    $panier = session('panier', []);
    $cartCount = collect($panier)->sum('quantite'); // total des quantités
    $view->with('cartCount', $cartCount);
    $view->with('panier', $panier); // facultatif si tu veux le récupérer partout
});

}

}
