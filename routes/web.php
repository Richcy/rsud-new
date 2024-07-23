<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\DoctorController;
use App\Http\Controllers\User\SketchController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\FarmasiController;
use App\Http\Controllers\User\QualityController;
use App\Http\Controllers\User\GreetingController;
use App\Http\Controllers\User\MaklumatController;
use App\Http\Controllers\User\AmbulanceController;
use App\Http\Controllers\User\PengaduanController;
use App\Http\Controllers\User\RadiologyController;
use App\Http\Controllers\User\StructureController;
use App\Http\Controllers\User\RehabMedikController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\User\HemodialisisController;
use App\Http\Controllers\User\LaboratoriumController;
use App\Http\Controllers\User\CompanyProfileController;
use App\Http\Controllers\User\HakDanKewajibanController;
use App\Http\Controllers\User\LayananUnggulanController;
use App\Http\Controllers\User\StandardPelayananController;
use App\Http\Controllers\User\InstalasiRawatInapController;
use App\Http\Controllers\User\InstalasiRawatJalanController;
use App\Http\Controllers\User\InstalasiGawatDaruratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/administrator.php';

Route::name('user.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile.index');
    Route::get('/greeting', [GreetingController::class, 'index'])->name('greeting.index');
    Route::get('/structure', [StructureController::class, 'index'])->name('structure.index');
    Route::get('/sketch', [SketchController::class, 'index'])->name('sketch.index');
    Route::get('/quality', [QualityController::class, 'index'])->name('quality.index');
    Route::get('/hak_kewajiban', [HakDanKewajibanController::class, 'index'])->name('hak_kewajiban.index');
    Route::get('/maklumat_pelayanan', [MaklumatController::class, 'index'])->name('maklumat_pelayanan.index');
    Route::get('/standard_pelayanan', [StandardPelayananController::class, 'index'])->name('standard_pelayanan.index');

    Route::get('/layanan_unggulan', [LayananUnggulanController::class, 'index'])->name('layanan_unggulan.index');
    Route::get('/rawat_inap', [InstalasiRawatInapController::class, 'index'])->name('rawat_inap.index');
    Route::get('/rawat_jalan', [InstalasiRawatJalanController::class, 'index'])->name('rawat_jalan.index');
    Route::get('/gawat_darurat', [InstalasiGawatDaruratController::class, 'index'])->name('gawat_darurat.index');
    Route::get('/laboratorium', [LaboratoriumController::class, 'index'])->name('laboratorium.index');
    Route::get('/hemodialisis', [HemodialisisController::class, 'index'])->name('hemodialisis.index');
    Route::get('/rehab_medik', [RehabMedikController::class, 'index'])->name('rehab_medik.index');
    Route::get('/radiology', [RadiologyController::class, 'index'])->name('radiology.index');
    Route::get('/farmasi', [FarmasiController::class, 'index'])->name('farmasi.index');
    Route::get('/ambulance', [AmbulanceController::class, 'index'])->name('ambulance.index');
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor.show');
});

Route::post('/logout', [LoginController::class, 'logout'])
                ->middleware('auth')
                ->name('logout');
