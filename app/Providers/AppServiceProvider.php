<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use Illuminate\Pagination\Paginator;
>>>>>>> 8306b3a6620a7d08023893795f28df15530dcdf1
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
<<<<<<< HEAD
=======
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
>>>>>>> 8306b3a6620a7d08023893795f28df15530dcdf1
    }
}
