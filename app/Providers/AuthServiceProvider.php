<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Definisikan gate untuk pengecekan peran (role) 'admin'.
        Gate::define('admin', function (User $user) {
            return $user->jabatan == 'admin';
        });

        // Definisikan gate untuk pengecekan peran (role) 'staff'.
        Gate::define('staff', function (User $user) {
            return $user->jabatan == 'staff';
        });
    }
}
