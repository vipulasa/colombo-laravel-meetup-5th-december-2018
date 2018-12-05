<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gates ?

        Gate::define('view-hidden', function ($user) {

            // check for the user condition and return true
            return true;

        });

        Gate::define('view-auth-content', function ($user) {

            // check for the user condition
            return true;

        });

        Gate::define('view-administration', function ($user) {

            // check if the user is logged in
            if ($user) {

                // check if the user has a role and the guard role is the same
                if ($user->role === 'administrator') {
                    return true;
                }
            }
            return false;
        });

    }
}
