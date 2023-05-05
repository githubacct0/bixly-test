<?php

namespace Route\Api;

use App\Http\Controllers\TruckController;
use Illuminate\Support\Facades\Route;

class Truck
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::get('trucks', [TruckController::class, 'index'])->name('truck.list');
            Route::get('trucks/{id}', [TruckController::class, 'show'])->name('truck.read');
            Route::post('trucks', [TruckController::class, 'store'])->name('truck.create');
            Route::put('trucks/{id}', [TruckController::class, 'update'])->name('truck.update');
            Route::delete('trucks/{id}', [TruckController::class, 'destroy'])->name('truck.delete');
        });
    }
}
