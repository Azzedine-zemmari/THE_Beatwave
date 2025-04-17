<?php

namespace App\Providers;

use App\Repositories\CommentaireRepository;
use App\Repositories\Contracts\CommentaireInterface;
use Illuminate\Support\ServiceProvider;

class CommentaireProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CommentaireInterface::class,CommentaireRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
