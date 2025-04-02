<?php

namespace App\Providers;

use App\Repositories\CategorieRepository;
use App\Repositories\Contracts\CategorieInterface;
use Illuminate\Support\ServiceProvider;

class CategorieProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategorieInterface::class,CategorieRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
