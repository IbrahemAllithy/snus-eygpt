<?php

namespace App\Providers;

use App\Models\Admin\Setting;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        // Passport::routes();
        Passport::ignoreRoutes();

        Passport::tokensCan([
            'user' => 'User Type',
            'customer' => 'Customer User Type',
        ]);

        Gate::define('isDigital', function () {
            $digital_store = Setting::type('store_setting', 'digital_store')->value('value');
            if ($digital_store == '1') {
                return true;
            }

            return false;
        });

    }
}
