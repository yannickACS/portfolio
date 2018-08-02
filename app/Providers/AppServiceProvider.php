<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use App\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role === 'admin';
        });
        if(request()->server("SCRIPT_NAME") !== 'artisan') {
            view ()->share ('pages', Page::all ());
        }
        Blade::if('adminOrOwner', function ($id) {
        return auth()->check() && (auth()->id() === $id || auth()->user()->role === 'admin');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
