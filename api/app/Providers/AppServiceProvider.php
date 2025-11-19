<?php

namespace App\Providers;

use App\HelpBoard\Interfaces\HelpPostInterface;
use App\HelpBoard\Repositories\HelpPostRepository;
use App\Interfaces\ListingRepositoryInterface;
use App\Repositories\EloquentListingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ListingRepositoryInterface::class, EloquentListingRepository::class);
        $this->app->bind(HelpPostInterface::class, HelpPostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
