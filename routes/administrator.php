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
use App\Http\Controllers\Admin\FarmasiController;
use App\Http\Controllers\Admin\CimanewsController;
use App\Http\Controllers\Admin\AmbulanceController;
use App\Http\Controllers\Admin\RadiologyController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HemodialisController;
use App\Http\Controllers\Admin\LaboratoriumController;
use App\Http\Controllers\Admin\RehabMedikController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\RunningTextController;
use App\Http\Controllers\Admin\CategoryEventController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\FeaturedDoctorController;
use App\Http\Controllers\Admin\ScheduleDoctorController;
use App\Http\Controllers\Admin\CategoryArticleController;
use App\Http\Controllers\Admin\LayananUnggulanController;
use App\Http\Controllers\Admin\InstalasiRawatInapController;
use App\Http\Controllers\Admin\InstalasiRawatJalanController;
use App\Http\Controllers\Admin\InstalasiGawatDaruratController;


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

Route::prefix('administrator')->name('admin.')->group(function () {
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

    Route::get('rawat-inap', [InstalasiRawatInapController::class, 'index'])->name('rawat-inap.index');
    Route::put('rawat-inap/{id}/update', [InstalasiRawatInapController::class, 'update'])->name('rawat-inap.update');

    Route::get('rawat-inap/sub-service/{service_id}', [InstalasiRawatInapController::class, 'indexSubService'])->name('rawat-inap.sub-service.index');
    Route::get('rawat-inap/sub-service/create/{service_id}', [InstalasiRawatInapController::class, 'createSubService'])->name('rawat-inap.sub-service.create');
    Route::post('rawat-inap/sub-service/{service_id}', [InstalasiRawatInapController::class, 'storeSubService'])->name('rawat-inap.sub-service.store');
    Route::get('rawat-inap/sub-service/{slug}/edit', [InstalasiRawatInapController::class, 'editSubService'])->name('rawat-inap.sub-service.edit');
    Route::put('rawat-inap/sub-service/{slug}', [InstalasiRawatInapController::class, 'updateSubService'])->name('rawat-inap.sub-service.update');
    Route::delete('rawat-inap/sub-service/{slug}', [InstalasiRawatInapController::class, 'destroySubService'])->name('rawat-inap.sub-service.destroy');

    Route::get('rawat-inap/gallery', [InstalasiRawatInapController::class, 'galleryIndex'])->name('rawat-inap.gallery.index');
    Route::get('rawat-inap/gallery/create', [InstalasiRawatInapController::class, 'galleryCreate'])->name('rawat-inap.gallery.create');
    Route::post('rawat-inap/gallery', [InstalasiRawatInapController::class, 'galleryStore'])->name('rawat-inap.gallery.store');
    Route::get('rawat-inap/gallery/{id}/edit', [InstalasiRawatInapController::class, 'galleryEdit'])->name('rawat-inap.gallery.edit');
    Route::put('rawat-inap/gallery/{id}', [InstalasiRawatInapController::class, 'galleryUpdate'])->name('rawat-inap.gallery.update');
    Route::delete('rawat-inap/gallery/{id}', [InstalasiRawatInapController::class, 'galleryDestroy'])->name('rawat-inap.gallery.destroy');

    Route::get('gawat-darurat', [InstalasiGawatDaruratController::class, 'index'])->name('gawat-darurat.index');
    Route::put('gawat-darurat/{id}/update', [InstalasiGawatDaruratController::class, 'update'])->name('gawat-darurat.update');

    Route::get('gawat-darurat/sub-service/{service_id}', [InstalasiGawatDaruratController::class, 'indexSubService'])->name('gawat-darurat.sub-service.index');
    Route::get('gawat-darurat/sub-service/create/{service_id}', [InstalasiGawatDaruratController::class, 'createSubService'])->name('gawat-darurat.sub-service.create');
    Route::post('gawat-darurat/sub-service/{service_id}', [InstalasiGawatDaruratController::class, 'storeSubService'])->name('gawat-darurat.sub-service.store');
    Route::get('gawat-darurat/sub-service/{slug}/edit', [InstalasiGawatDaruratController::class, 'editSubService'])->name('gawat-darurat.sub-service.edit');
    Route::put('gawat-darurat/sub-service/{slug}', [InstalasiGawatDaruratController::class, 'updateSubService'])->name('gawat-darurat.sub-service.update');
    Route::delete('gawat-darurat/sub-service/{slug}', [InstalasiGawatDaruratController::class, 'destroySubService'])->name('gawat-darurat.sub-service.destroy');

    Route::get('gawat-darurat/gallery', [InstalasiGawatDaruratController::class, 'galleryIndex'])->name('gawat-darurat.gallery.index');
    Route::get('gawat-darurat/gallery/create', [InstalasiGawatDaruratController::class, 'galleryCreate'])->name('gawat-darurat.gallery.create');
    Route::post('gawat-darurat/gallery', [InstalasiGawatDaruratController::class, 'galleryStore'])->name('gawat-darurat.gallery.store');
    Route::get('gawat-darurat/gallery/{id}/edit', [InstalasiGawatDaruratController::class, 'galleryEdit'])->name('gawat-darurat.gallery.edit');
    Route::put('gawat-darurat/gallery/{id}', [InstalasiGawatDaruratController::class, 'galleryUpdate'])->name('gawat-darurat.gallery.update');
    Route::delete('gawat-darurat/gallery/{id}', [InstalasiGawatDaruratController::class, 'galleryDestroy'])->name('gawat-darurat.gallery.destroy');

    Route::get('Laboratorium', [LaboratoriumController::class, 'index'])->name('Laboratorium.index');
    Route::put('Laboratorium/{id}/update', [LaboratoriumController::class, 'update'])->name('Laboratorium.update');

    Route::get('Laboratorium/sub-service/{service_id}', [LaboratoriumController::class, 'indexSubService'])->name('Laboratorium.sub-service.index');
    Route::get('Laboratorium/sub-service/create/{service_id}', [LaboratoriumController::class, 'createSubService'])->name('Laboratorium.sub-service.create');
    Route::post('Laboratorium/sub-service/{service_id}', [LaboratoriumController::class, 'storeSubService'])->name('Laboratorium.sub-service.store');
    Route::get('Laboratorium/sub-service/{slug}/edit', [LaboratoriumController::class, 'editSubService'])->name('Laboratorium.sub-service.edit');
    Route::put('Laboratorium/sub-service/{slug}', [LaboratoriumController::class, 'updateSubService'])->name('Laboratorium.sub-service.update');
    Route::delete('Laboratorium/sub-service/{slug}', [LaboratoriumController::class, 'destroySubService'])->name('Laboratorium.sub-service.destroy');

    Route::get('Laboratorium/gallery', [LaboratoriumController::class, 'galleryIndex'])->name('Laboratorium.gallery.index');
    Route::get('Laboratorium/gallery/create', [LaboratoriumController::class, 'galleryCreate'])->name('Laboratorium.gallery.create');
    Route::post('Laboratorium/gallery', [LaboratoriumController::class, 'galleryStore'])->name('Laboratorium.gallery.store');
    Route::get('Laboratorium/gallery/{id}/edit', [LaboratoriumController::class, 'galleryEdit'])->name('Laboratorium.gallery.edit');
    Route::put('Laboratorium/gallery/{id}', [LaboratoriumController::class, 'galleryUpdate'])->name('Laboratorium.gallery.update');
    Route::delete('Laboratorium/gallery/{id}', [LaboratoriumController::class, 'galleryDestroy'])->name('Laboratorium.gallery.destroy');

    Route::get('radiology', [RadiologyController::class, 'index'])->name('radiology.index');
    Route::put('radiology/{id}/update', [RadiologyController::class, 'update'])->name('radiology.update');

    Route::get('radiology/sub-service/{service_id}', [RadiologyController::class, 'indexSubService'])->name('radiology.sub-service.index');
    Route::get('radiology/sub-service/create/{service_id}', [RadiologyController::class, 'createSubService'])->name('radiology.sub-service.create');
    Route::post('radiology/sub-service/{service_id}', [RadiologyController::class, 'storeSubService'])->name('radiology.sub-service.store');
    Route::get('radiology/sub-service/{slug}/edit', [RadiologyController::class, 'editSubService'])->name('radiology.sub-service.edit');
    Route::put('radiology/sub-service/{slug}', [RadiologyController::class, 'updateSubService'])->name('radiology.sub-service.update');
    Route::delete('radiology/sub-service/{slug}', [RadiologyController::class, 'destroySubService'])->name('radiology.sub-service.destroy');

    Route::get('radiology/gallery', [RadiologyController::class, 'galleryIndex'])->name('radiology.gallery.index');
    Route::get('radiology/gallery/create', [RadiologyController::class, 'galleryCreate'])->name('radiology.gallery.create');
    Route::post('radiology/gallery', [RadiologyController::class, 'galleryStore'])->name('radiology.gallery.store');
    Route::get('radiology/gallery/{id}/edit', [RadiologyController::class, 'galleryEdit'])->name('radiology.gallery.edit');
    Route::put('radiology/gallery/{id}', [RadiologyController::class, 'galleryUpdate'])->name('radiology.gallery.update');
    Route::delete('radiology/gallery/{id}', [RadiologyController::class, 'galleryDestroy'])->name('radiology.gallery.destroy');

    Route::get('hemodialis', [HemodialisController::class, 'index'])->name('hemodialis.index');
    Route::put('hemodialis/{id}/update', [HemodialisController::class, 'update'])->name('hemodialis.update');

    Route::get('hemodialis/sub-service/{service_id}', [HemodialisController::class, 'indexSubService'])->name('hemodialis.sub-service.index');
    Route::get('hemodialis/sub-service/create/{service_id}', [HemodialisController::class, 'createSubService'])->name('hemodialis.sub-service.create');
    Route::post('hemodialis/sub-service/{service_id}', [HemodialisController::class, 'storeSubService'])->name('hemodialis.sub-service.store');
    Route::get('hemodialis/sub-service/{slug}/edit', [HemodialisController::class, 'editSubService'])->name('hemodialis.sub-service.edit');
    Route::put('hemodialis/sub-service/{slug}', [HemodialisController::class, 'updateSubService'])->name('hemodialis.sub-service.update');
    Route::delete('hemodialis/sub-service/{slug}', [HemodialisController::class, 'destroySubService'])->name('hemodialis.sub-service.destroy');

    Route::get('hemodialis/gallery', [HemodialisController::class, 'galleryIndex'])->name('hemodialis.gallery.index');
    Route::get('hemodialis/gallery/create', [HemodialisController::class, 'galleryCreate'])->name('hemodialis.gallery.create');
    Route::post('hemodialis/gallery', [HemodialisController::class, 'galleryStore'])->name('hemodialis.gallery.store');
    Route::get('hemodialis/gallery/{id}/edit', [HemodialisController::class, 'galleryEdit'])->name('hemodialis.gallery.edit');
    Route::put('hemodialis/gallery/{id}', [HemodialisController::class, 'galleryUpdate'])->name('hemodialis.gallery.update');
    Route::delete('hemodialis/gallery/{id}', [HemodialisController::class, 'galleryDestroy'])->name('hemodialis.gallery.destroy');

    Route::get('farmasi', [FarmasiController::class, 'index'])->name('farmasi.index');
    Route::put('farmasi/{id}/update', [FarmasiController::class, 'update'])->name('farmasi.update');

    Route::get('farmasi/sub-service/{service_id}', [FarmasiController::class, 'indexSubService'])->name('farmasi.sub-service.index');
    Route::get('farmasi/sub-service/create/{service_id}', [FarmasiController::class, 'createSubService'])->name('farmasi.sub-service.create');
    Route::post('farmasi/sub-service/{service_id}', [FarmasiController::class, 'storeSubService'])->name('farmasi.sub-service.store');
    Route::get('farmasi/sub-service/{slug}/edit', [FarmasiController::class, 'editSubService'])->name('farmasi.sub-service.edit');
    Route::put('farmasi/sub-service/{slug}', [FarmasiController::class, 'updateSubService'])->name('farmasi.sub-service.update');
    Route::delete('farmasi/sub-service/{slug}', [FarmasiController::class, 'destroySubService'])->name('farmasi.sub-service.destroy');

    Route::get('farmasi/gallery', [FarmasiController::class, 'galleryIndex'])->name('farmasi.gallery.index');
    Route::get('farmasi/gallery/create', [FarmasiController::class, 'galleryCreate'])->name('farmasi.gallery.create');
    Route::post('farmasi/gallery', [FarmasiController::class, 'galleryStore'])->name('farmasi.gallery.store');
    Route::get('farmasi/gallery/{id}/edit', [FarmasiController::class, 'galleryEdit'])->name('farmasi.gallery.edit');
    Route::put('farmasi/gallery/{id}', [FarmasiController::class, 'galleryUpdate'])->name('farmasi.gallery.update');
    Route::delete('farmasi/gallery/{id}', [FarmasiController::class, 'galleryDestroy'])->name('farmasi.gallery.destroy');

    Route::get('rehab-medik', [RehabMedikController::class, 'index'])->name('rehab-medik.index');
    Route::put('rehab-medik/{id}/update', [RehabMedikController::class, 'update'])->name('rehab-medik.update');

    Route::get('rehab-medik/sub-service/{service_id}', [RehabMedikController::class, 'indexSubService'])->name('rehab-medik.sub-service.index');
    Route::get('rehab-medik/sub-service/create/{service_id}', [RehabMedikController::class, 'createSubService'])->name('rehab-medik.sub-service.create');
    Route::post('rehab-medik/sub-service/{service_id}', [RehabMedikController::class, 'storeSubService'])->name('rehab-medik.sub-service.store');
    Route::get('rehab-medik/sub-service/{slug}/edit', [RehabMedikController::class, 'editSubService'])->name('rehab-medik.sub-service.edit');
    Route::put('rehab-medik/sub-service/{slug}', [RehabMedikController::class, 'updateSubService'])->name('rehab-medik.sub-service.update');
    Route::delete('rehab-medik/sub-service/{slug}', [RehabMedikController::class, 'destroySubService'])->name('rehab-medik.sub-service.destroy');

    Route::get('rehab-medik/gallery', [RehabMedikController::class, 'galleryIndex'])->name('rehab-medik.gallery.index');
    Route::get('rehab-medik/gallery/create', [RehabMedikController::class, 'galleryCreate'])->name('rehab-medik.gallery.create');
    Route::post('rehab-medik/gallery', [RehabMedikController::class, 'galleryStore'])->name('rehab-medik.gallery.store');
    Route::get('rehab-medik/gallery/{id}/edit', [RehabMedikController::class, 'galleryEdit'])->name('rehab-medik.gallery.edit');
    Route::put('rehab-medik/gallery/{id}', [RehabMedikController::class, 'galleryUpdate'])->name('rehab-medik.gallery.update');
    Route::delete('rehab-medik/gallery/{id}', [RehabMedikController::class, 'galleryDestroy'])->name('rehab-medik.gallery.destroy');

    Route::get('ambulance', [AmbulanceController::class, 'index'])->name('ambulance.index');
    Route::put('ambulance/{id}/update', [AmbulanceController::class, 'update'])->name('ambulance.update');

    Route::get('ambulance/sub-service/{service_id}', [AmbulanceController::class, 'indexSubService'])->name('ambulance.sub-service.index');
    Route::get('ambulance/sub-service/create/{service_id}', [AmbulanceController::class, 'createSubService'])->name('ambulance.sub-service.create');
    Route::post('ambulance/sub-service/{service_id}', [AmbulanceController::class, 'storeSubService'])->name('ambulance.sub-service.store');
    Route::get('ambulance/sub-service/{slug}/edit', [AmbulanceController::class, 'editSubService'])->name('ambulance.sub-service.edit');
    Route::put('ambulance/sub-service/{slug}', [AmbulanceController::class, 'updateSubService'])->name('ambulance.sub-service.update');
    Route::delete('ambulance/sub-service/{slug}', [AmbulanceController::class, 'destroySubService'])->name('ambulance.sub-service.destroy');

    Route::get('ambulance/gallery', [AmbulanceController::class, 'galleryIndex'])->name('ambulance.gallery.index');
    Route::get('ambulance/gallery/create', [AmbulanceController::class, 'galleryCreate'])->name('ambulance.gallery.create');
    Route::post('ambulance/gallery', [AmbulanceController::class, 'galleryStore'])->name('ambulance.gallery.store');
    Route::get('ambulance/gallery/{id}/edit', [AmbulanceController::class, 'galleryEdit'])->name('ambulance.gallery.edit');
    Route::put('ambulance/gallery/{id}', [AmbulanceController::class, 'galleryUpdate'])->name('ambulance.gallery.update');
    Route::delete('ambulance/gallery/{id}', [AmbulanceController::class, 'galleryDestroy'])->name('ambulance.gallery.destroy');

    Route::resource('category-event', CategoryEventController::class);
    Route::resource('category-article', CategoryArticleController::class);
    Route::resource('field-doctor', FieldDoctorController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('featured-doctor', FeaturedDoctorController::class);
    Route::resource('schedule-doctor', ScheduleDoctorController::class);
    Route::resource('admin', AdminController::class);
});
});
