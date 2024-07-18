<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\FieldDoctorController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CimanewsController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\RunningTextController;
use App\Http\Controllers\Admin\CategoryEventController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\FeaturedDoctorController;
use App\Http\Controllers\Admin\ScheduleDoctorController;
use App\Http\Controllers\Admin\CategoryArticleController;


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

    Route::get('event', [EventController::class, 'index'])->name('event.index');
    Route::get('event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('event', [EventController::class, 'store'])->name('event.store');
    Route::get('event/{slug}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('event/{slug}', [EventController::class, 'update'])->name('event.update');
    Route::delete('event/{slug}', [EventController::class, 'destroy'])->name('event.destroy');

    Route::get('article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('article/{slug}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('article/{slug}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('article/{slug}', [ArticleController::class, 'destroy'])->name('article.destroy');

    Route::get('cimanews', [CimanewsController::class, 'index'])->name('cimanews.index');
    Route::get('cimanews/create', [CimanewsController::class, 'create'])->name('cimanews.create');
    Route::post('cimanews', [CimanewsController::class, 'store'])->name('cimanews.store');
    Route::get('cimanews/{slug}/edit', [CimanewsController::class, 'edit'])->name('cimanews.edit');
    Route::put('cimanews/{slug}', [CimanewsController::class, 'update'])->name('cimanews.update');
    Route::delete('cimanews/{slug}', [CimanewsController::class, 'destroy'])->name('cimanews.destroy');

    Route::get('running-text', [RunningTextController::class, 'index'])->name('running-text.index');
    Route::put('running-text/{id}/update', [RunningTextController::class, 'update'])->name('running-text.update');

    Route::get('structure', [CompanyProfileController::class, 'structure'])->name('structure.index');
    Route::put('structure/{id}/update', [CompanyProfileController::class, 'structureUpdate'])->name('structure.update');

    Route::get('sketch', [CompanyProfileController::class, 'sketch'])->name('sketch.index');
    Route::put('sketch/{id}/update', [CompanyProfileController::class, 'sketchUpdate'])->name('sketch.update');

    Route::get('quality-check', [CompanyProfileController::class, 'qualityCheck'])->name('quality-check.index');
    Route::put('quality-check/{id}/update', [CompanyProfileController::class, 'qualityCheckUpdate'])->name('quality-check.update');

    Route::get('maklumat-pelayanan', [CompanyProfileController::class, 'pelayanan'])->name('maklumat-pelayanan.index');
    Route::put('maklumat-pelayanan/{id}/update', [CompanyProfileController::class, 'pelayananUpdate'])->name('maklumat-pelayanan.update');

    Route::get('hak-kewajiban', [CompanyProfileController::class, 'hak'])->name('hak-kewajiban.index');
    Route::put('hak-kewajiban/{id}/update', [CompanyProfileController::class, 'hakUpdate'])->name('hak-kewajiban.update');

    Route::get('standar_pelayanan', [CompanyProfileController::class, 'standarPelayanan'])->name('standar_pelayanan.index');
    Route::put('standar_pelayanan/{id}/update', [CompanyProfileController::class, 'standarPelayananUpdate'])->name('standar_pelayanan.update');

    Route::resource('category-event', CategoryEventController::class);
    Route::resource('category-article', CategoryArticleController::class);
    Route::resource('field-doctor', FieldDoctorController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('featured-doctor', FeaturedDoctorController::class);
    Route::resource('schedule-doctor', ScheduleDoctorController::class);
});
