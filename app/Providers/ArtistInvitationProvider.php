<?php

namespace App\Providers;

use App\Repositories\ArtistInvitationRepository;
use App\Repositories\Contracts\ArtistInvitationInterface;
use Illuminate\Support\ServiceProvider;

class ArtistInvitationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ArtistInvitationInterface::class,ArtistInvitationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
