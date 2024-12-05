<?php

namespace App\Providers;

use App\Models\Meta;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use Illuminate\Pagination\Paginator;

use Exception;

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

        View::share('setting', null);

        try {
            // Check for table existence and set actual values
            if (Schema::hasTable('settings')) {
                View::share('setting', Setting::first());
            }

            if (Schema::hasTable('metas')) {
                View::share('meta', Meta::first());
            }
        } 
        
        catch (Exception $e) {
            // Log the exception if needed
        }

        Paginator::useBootstrap();
    }
}
