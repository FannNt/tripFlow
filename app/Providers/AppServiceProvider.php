<?php

namespace App\Providers;

use App\Repositories\City\CityRepository;
use App\Repositories\City\CityRepositoryImplement;
use App\Services\City\CityService;
use App\Services\City\CityServiceImplement;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CityService::class, CityServiceImplement::class);
        $this->app->bind(CityRepository::class, CityRepositoryImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
