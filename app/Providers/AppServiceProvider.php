<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('is_admin', function ($user) : bool{
            return $user->isAdmin();
        });

        Gate::define('is_owner', function ($user, $register): bool{
            return $user->id === $register->user_id;
        });
    }
}
