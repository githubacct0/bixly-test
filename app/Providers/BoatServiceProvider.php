<?php

namespace App\Providers;

use App\Contracts\BoatContract;
use App\Services\BoatService;
use Illuminate\Support\ServiceProvider;

class BoatServiceProvider extends ServiceProvider
{
    /**
     * Boat services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BoatContract::class, fn () => new BoatService());
    }
}
