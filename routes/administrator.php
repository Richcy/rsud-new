<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('adminstrator')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.system');

    Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/{slug}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('slider/{slug}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('slider/{slug}', [SliderController::class, 'destroy'])->name('slider.destroy');

});
