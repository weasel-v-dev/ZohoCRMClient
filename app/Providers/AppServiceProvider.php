<?php

namespace App\Providers;

use App\Services\ZohoCRM\ZohoCRMFacade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ZohoCRMFacade::class, function () {
            return new ZohoCRMFacade();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
