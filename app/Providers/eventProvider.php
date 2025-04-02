<?php

namespace App\Providers;

use App\Repositories\Contracts\EventInterface;
use App\Repositories\EventRepository;
use Illuminate\Support\ServiceProvider;

class eventProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EventInterface::class,EventRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
