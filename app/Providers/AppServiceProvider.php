<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Gate;
use Auth;

use App\Http\Controllers\DashboardController;
use App\Classes\SWAlertClass;
use App\Classes\imageUrl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('DashboardController', DashboardController::class);
            $loader->alias('imageUrl', imageUrl::class);
            $loader->alias('SWAlertClass', SWAlertClass::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('felhasználó', function() {
            return Auth::user()->usertypes_id == 1;
        });
        Gate::define('rendszergazda', function() {
            return Auth::user()->usertypes_id == 2;
        });
        Gate::define('fejlesztő', function() {
            return Auth::user()->usertypes_id == 3;
        });
    }
}
