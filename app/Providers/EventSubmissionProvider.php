<?php

namespace App\Providers;

use App\Repositories\Contracts\EventSubmissionInterface;
use App\Repositories\EventSubmissionRepository;
use Illuminate\Support\ServiceProvider;

class EventSubmissionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EventSubmissionInterface::class,EventSubmissionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
