<?php

namespace App\Providers;

use App\Repositories\Contracts\InscriptionInterface;
use App\Repositories\InscriptionRepository;
use Illuminate\Support\ServiceProvider;

class InscriptionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(InscriptionInterface::class,InscriptionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
