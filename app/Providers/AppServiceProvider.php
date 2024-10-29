<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

<<<<<<< HEAD
    public function register()
=======
    /**
     * Bootstrap any application services.
     */
    public function boot()
>>>>>>> cee96777ac577bf48a14c60ba5ad9537f0901cf5
    {
        Schema::defaultStringLength(191);
    }
}
