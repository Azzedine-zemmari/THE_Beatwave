<?php

namespace App\Providers;

use App\Repositories\Contracts\EventPurchaseInterface;
use App\Repositories\EventPurchaseRepository;
use Illuminate\Support\ServiceProvider;

class EventPurchaseProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EventPurchaseInterface::class,EventPurchaseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
