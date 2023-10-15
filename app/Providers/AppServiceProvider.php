<?php

namespace App\Providers;

use App\Enums\LogTypeEnum;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

use App\Http\Controllers\DashboardController;
use App\Classes\SWAlertClass;
use App\Classes\imageUrl;
use App\Classes\ToolsClass;
use App\Classes\SettlementsClass;
use App\Classes\myUserClass;
use App\Classes\Models\ModelPath;
use App\Enums\RolesEnum;

use myUser;

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
            $loader->alias('ToolsClass', ToolsClass::class);
            $loader->alias('SettlementsClass', SettlementsClass::class);
            $loader->alias('myUser', myUserClass::class);
            $loader->alias('ModelPath', ModelPath::class);
            $loader->alias('RolesEnum', RolesEnum::class);
            $loader->alias('LogTypeEnum', LogTypeEnum::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config( [ 'userId' => 0 ] );
    }


}
