<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\BookPurchaseRepositoryInterface
;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('BookPurchaseService', function($app) {
            return new \App\Service\BookPurchaseService($app->make(BookPurchaseRepositoryInterface::class));
        });

        $this->app->bind(BookPurchaseRepositoryInterface::class, function($app) {
            return new \App\Repository\BookPurchaseRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
