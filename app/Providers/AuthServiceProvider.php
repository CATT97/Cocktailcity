<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('view-admin', function ($user) {
            return $user->Perfil == 'Administrador';
        });

        Gate::define('view-employee', function ($user) {
            return $user->Perfil == 'Administrador' or $user->Perfil == 'Empleado';
        });

        Paginator::useBootstrapFour();
    }
}
