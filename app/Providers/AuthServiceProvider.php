<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('createData', function ($user){
            return $user->hasAnyRoles(['superadministrator', 'accountant']);
        });

        Gate::define('updateData', function ($user){
            return $user->hasAnyRoles(['admin', 'accountant']);
        });

        Gate::define('getData', function ($user){
            return $user->hasAnyRoles(['superadministrator', 'accountant', 'sales-manager']);
        });

        Gate::define('deleteData', function ($user){
            return $user->hasAnyRoles(['superadministrator']);
        });
    }
}
