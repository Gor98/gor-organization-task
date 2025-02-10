<?php

namespace App\Providers;

use App\Contracts\ActivityServiceContract;
use App\Contracts\BuildingServiceContract;
use App\Contracts\OrganizationServiceContract;
use App\Services\ActivityService;
use App\Services\BuildingService;
use App\Services\OrganizationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrganizationServiceContract::class, OrganizationService::class);
        $this->app->bind(BuildingServiceContract::class, BuildingService::class);
        $this->app->bind(ActivityServiceContract::class, ActivityService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
