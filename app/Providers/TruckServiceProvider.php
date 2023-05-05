<?php

namespace App\Providers;

use App\Contracts\TruckContract;
use App\Services\TruckService;
use Illuminate\Support\ServiceProvider;

class TruckServiceProvider extends ServiceProvider
{
    /**
     * Truck services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TruckContract::class, fn () => new TruckService());
    }
}
