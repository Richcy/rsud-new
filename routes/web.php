<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [LoginController::class, 'logout'])
                ->middleware('auth')
                ->name('logout');
