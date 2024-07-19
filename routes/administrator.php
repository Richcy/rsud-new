<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\FieldDoctorController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CimanewsController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\RunningTextController;
use App\Http\Controllers\Admin\CategoryEventController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\FeaturedDoctorController;
use App\Http\Controllers\Admin\ScheduleDoctorController;
use App\Http\Controllers\Admin\CategoryArticleController;
use App\Http\Controllers\Admin\LayananUnggulanController;
use App\Http\Controllers\Admin\InstalasiRawatJalanController;


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
    Route::post('upload', [ImageUploadController::class, 'upload'])->name('upload');

   Route::middleware(['auth:admin'])->group(function () {
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

    Route::get('profile', [CompanyProfileController::class, 'profile'])->name('profile.index');
    Route::put('profile/{id}/update', [CompanyProfileController::class, 'profileUpdate'])->name('profile.update');

    Route::get('profile-gallery', [CompanyProfileController::class, 'profileGallery'])->name('profileGallery.index');
    Route::get('profile-gallery/create', [CompanyProfileController::class, 'profileGalleryCreate'])->name('profileGallery.create');
    Route::post('profile-gallery/', [CompanyProfileController::class, 'profileGalleryStore'])->name('profileGallery.store');
    Route::delete('profile-gallery/{id}/', [CompanyProfileController::class, 'profileGalleryDestroy'])->name('profileGallery.destroy');

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

    Route::get('greeting-directur', [CompanyProfileController::class, 'greeting'])->name('greeting-directur.index');
    Route::put('greeting-directur/{id}/update', [CompanyProfileController::class, 'greetingUpdate'])->name('greeting-directur.update');

    Route::get('layanan-unggulan', [LayananUnggulanController::class, 'index'])->name('layanan-unggulan.index');
    Route::put('layanan-unggulan/{id}/update', [LayananUnggulanController::class, 'update'])->name('layanan-unggulan.update');

    Route::get('layanan-unggulan/sub-service/{service_id}', [LayananUnggulanController::class, 'indexSubService'])->name('layanan-unggulan-sub-service.index');
    Route::get('layanan-unggulan/sub-service/create/{service_id}', [LayananUnggulanController::class, 'createSubService'])->name('layanan-unggulan-sub-service.create');
    Route::post('layanan-unggulan/sub-service/{service_id}', [LayananUnggulanController::class, 'storeSubService'])->name('layanan-unggulan-sub-service.store');
    Route::get('layanan-unggulan/sub-service/{slug}/edit', [LayananUnggulanController::class, 'editSubService'])->name('layanan-unggulan-sub-service.edit');
    Route::put('layanan-unggulan/sub-service/{slug}', [LayananUnggulanController::class, 'updateSubService'])->name('layanan-unggulan-sub-service.update');
    Route::delete('layanan-unggulan/sub-service/{slug}', [LayananUnggulanController::class, 'destroySubService'])->name('layanan-unggulan-sub-service.destroy');

    Route::get('layanan-unggulan/gallery', [LayananUnggulanController::class, 'galleryIndex'])->name('layanan-unggulan-gallery.index');
    Route::get('layanan-unggulan/gallery/create', [LayananUnggulanController::class, 'galleryCreate'])->name('layanan-unggulan-gallery.create');
    Route::post('layanan-unggulan/gallery', [LayananUnggulanController::class, 'galleryStore'])->name('layanan-unggulan-gallery.store');
    Route::get('layanan-unggulan/gallery/{id}/edit', [LayananUnggulanController::class, 'galleryEdit'])->name('layanan-unggulan-gallery.edit');
    Route::put('layanan-unggulan/gallery/{id}', [LayananUnggulanController::class, 'galleryUpdate'])->name('layanan-unggulan-gallery.update');
    Route::delete('layanan-unggulan/gallery/{id}', [LayananUnggulanController::class, 'galleryDestroy'])->name('layanan-unggulan-gallery.destroy');

    Route::get('rawat-jalan', [InstalasiRawatJalanController::class, 'index'])->name('rawat-jalan.index');
    Route::put('rawat-jalan/{id}/update', [InstalasiRawatJalanController::class, 'update'])->name('rawat-jalan.update');

    Route::get('rawat-jalan/sub-service/{service_id}', [InstalasiRawatJalanController::class, 'indexSubService'])->name('rawat-jalan.sub-service.index');
    Route::get('rawat-jalan/sub-service/create/{service_id}', [InstalasiRawatJalanController::class, 'createSubService'])->name('rawat-jalan.sub-service.create');
    Route::post('rawat-jalan/sub-service/{service_id}', [InstalasiRawatJalanController::class, 'storeSubService'])->name('rawat-jalan.sub-service.store');
    Route::get('rawat-jalan/sub-service/{slug}/edit', [InstalasiRawatJalanController::class, 'editSubService'])->name('rawat-jalan.sub-service.edit');
    Route::put('rawat-jalan/sub-service/{slug}', [InstalasiRawatJalanController::class, 'updateSubService'])->name('rawat-jalan.sub-service.update');
    Route::delete('rawat-jalan/sub-service/{slug}', [InstalasiRawatJalanController::class, 'destroySubService'])->name('rawat-jalan.sub-service.destroy');

    Route::get('rawat-jalan/gallery', [InstalasiRawatJalanController::class, 'galleryIndex'])->name('rawat-jalan.gallery.index');
    Route::get('rawat-jalan/gallery/create', [InstalasiRawatJalanController::class, 'galleryCreate'])->name('rawat-jalan.gallery.create');
    Route::post('rawat-jalan/gallery', [InstalasiRawatJalanController::class, 'galleryStore'])->name('rawat-jalan.gallery.store');
    Route::get('rawat-jalan/gallery/{id}/edit', [InstalasiRawatJalanController::class, 'galleryEdit'])->name('rawat-jalan.gallery.edit');
    Route::put('rawat-jalan/gallery/{id}', [InstalasiRawatJalanController::class, 'galleryUpdate'])->name('rawat-jalan.gallery.update');
    Route::delete('rawat-jalan/gallery/{id}', [InstalasiRawatJalanController::class, 'galleryDestroy'])->name('rawat-jalan.gallery.destroy');

    Route::resource('category-event', CategoryEventController::class);
    Route::resource('category-article', CategoryArticleController::class);
    Route::resource('field-doctor', FieldDoctorController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('featured-doctor', FeaturedDoctorController::class);
    Route::resource('schedule-doctor', ScheduleDoctorController::class);
    Route::resource('admin', AdminController::class);
});
});
