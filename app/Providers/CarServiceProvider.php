<?php

namespace App\Providers;

use App\Contracts\CarContract;
use App\Services\CarService;
use Illuminate\Support\ServiceProvider;

class CarServiceProvider extends ServiceProvider
{
    /**
     * Car services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CarContract::class, fn () => new CarService());
    }

}
