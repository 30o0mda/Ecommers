<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Share cart count using a view composer so Auth is checked per request.
        View::composer('*', function ($view) {
            $user = Auth::user();
            $cartCount = 0;

            if ($user) {
                // $cartCount = \App\Models\Cart::where('user_id', $user->id)->sum('quantity');
                $cartCount = Cart::where('user_id', $user->id)->pluck('product_id')->count();
            }

            $view->with('cartCount', $cartCount);
        });
        /*
        Progress update: I updated AppServiceProvider.php to use a view composer that checks Auth per request and shares globalcartCount (0 for guests). Next I'll run PHP lint on that file to verify syntax. I'll run php -l on the file.
        php -l /home/techlaber/projects/Ecommers/app/Providers/AppServiceProvider.php
No syntax errors detected in /home/techlaber/projects/Ecommers/app/Providers/AppServiceProvider.php */
    }
}
