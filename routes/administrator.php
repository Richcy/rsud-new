<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\RunningTextController;
use App\Http\Controllers\Admin\CategoryEventController;


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

    Route::get('career', [CareerController::class, 'index'])->name('career.index');
    Route::get('career/create', [CareerController::class, 'create'])->name('career.create');
    Route::post('career', [CareerController::class, 'store'])->name('career.store');
    Route::get('career/{slug}/edit', [CareerController::class, 'edit'])->name('career.edit');
    Route::put('career/{slug}', [CareerController::class, 'update'])->name('career.update');
    Route::delete('career/{slug}', [CareerController::class, 'destroy'])->name('career.destroy');
    Route::post('career/change-status', [CareerController::class, 'changeStatus'])->name('career.changeStatus');

    Route::get('running-text', [RunningTextController::class, 'index'])->name('running-text.index');
    Route::put('running-text/{id}/update', [RunningTextController::class, 'update'])->name('running-text.update');

    Route::resource('category-event', CategoryEventController::class);
});
