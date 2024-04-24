<?php

namespace App\Providers;

use App\Http\ViewComposers\BreakingCompser;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        view::composer('frontend.layouts.header', BreakingCompser::class);
    }
}
