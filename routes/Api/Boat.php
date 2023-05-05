<?php

namespace Route\Api;

use App\Http\Controllers\BoatController;
use Illuminate\Support\Facades\Route;

class Boat
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::get('boats', [BoatController::class, 'index'])->name('boat.list');
            Route::get('boats/{id}', [BoatController::class, 'show'])->name('boat.read');
            Route::post('boats', [BoatController::class, 'store'])->name('boat.create');
            Route::put('boats/{id}', [BoatController::class, 'update'])->name('boat.update');
            Route::delete('boats/{id}', [BoatController::class, 'destroy'])->name('boat.delete');
        });
    }
}
