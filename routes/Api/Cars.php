<?php

namespace Route\Api;



use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

class Cars
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::get('cars', [CarController::class, 'index'])->name('car.list');
            Route::get('cars/{id}', [CarController::class, 'show'])->name('car.read');
            Route::post('cars', [CarController::class, 'store'])->name('car.create');
            Route::put('cars/{id}', [CarController::class, 'update'])->name('car.update');
            Route::delete('cars/{id}', [CarController::class, 'destroy'])->name('car.delete');
        });
    }
}
