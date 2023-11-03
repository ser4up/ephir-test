<?php

namespace App\Providers;

use App\Services\ExternalUser\ExternalUserServiceI;
use App\Services\ExternalUser\ExternalUserService;
use App\Services\ExternalUser\ApiClientI;
use App\Services\ExternalUser\ApiClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ExternalUserServiceI::class, ExternalUserService::class);
        $this->app->singleton(ApiClientI::class, ApiClient::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
