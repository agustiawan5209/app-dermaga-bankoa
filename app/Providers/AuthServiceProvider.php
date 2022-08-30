<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('managed-Admin', function(User $user){
            return $user->role_id = "1";
        });
        Gate::define('managed-Pemilik', function(User $user){
            return $user->role_id = "2";
        });
        Gate::define('managed-Customer', function(User $user){
            return $user->role_id = "3";
        });

        //
    }
}
