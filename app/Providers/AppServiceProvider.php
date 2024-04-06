<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserInterface;
use App\Services\UserServices;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserServices::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
