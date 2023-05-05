<?php

namespace Route\Api;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

class Auth
{
    static function register()
    {
        Route::post('/login', [LoginController::class, 'login'])->name('login')
            ->middleware('guest');
    }
}
