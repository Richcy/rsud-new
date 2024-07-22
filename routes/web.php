<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\SketchController;
use App\Http\Controllers\User\QualityController;
use App\Http\Controllers\User\GreetingController;
use App\Http\Controllers\User\MaklumatController;
use App\Http\Controllers\User\StructureController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\User\CompanyProfileController;
use App\Http\Controllers\User\HakDanKewajibanController;
use App\Http\Controllers\User\LayananUnggulanController;
use App\Http\Controllers\User\StandardPelayananController;

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
});

Route::post('/logout', [LoginController::class, 'logout'])
                ->middleware('auth')
                ->name('logout');
