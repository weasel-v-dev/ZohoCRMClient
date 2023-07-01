<?php

namespace App\Providers;


use App\Observers\CompanyObserver;
use App\Observers\EmployeeObserver;
use App\Observers\PositionObserver;
use App\Observers\ReviewerObserver;
use App\Services\ZohoCRM\Deal\DealService;
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
        $this->app->bind(DealService::class, function () {
            return new DealService();
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
