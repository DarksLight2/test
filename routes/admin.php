<?php

use App\Http\Controllers\Admin\IndexController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [IndexController::class, 'home']);
});
