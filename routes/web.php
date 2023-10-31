<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TuanRumahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/pengajuan-tamu', [TamuController::class, 'createForm'])->name('tamu.create');
Route::post('/pengajuan-tamu', [TamuController::class, 'store'])->name('tamu.store');
Route::get('/pengajuan-tamu/create', [TamuController::class, 'create'])->name('tamu.create');
Route::get('/pengajuan-tamu2', [TamuController::class, 'surat2'])->name('tamu.surat2');
Route::post('/pengajuan-tamu2', [TamuController::class, 'surat2'])->name('simpan.data.tamu');


//auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('registerform');
Route::post('/store', [AuthController::class, 'store'])->name('store');

Route::middleware(['auth', 'role:1'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "administrator"

});
Route::middleware(['auth', 'role:2'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "admin jkt"

});
Route::middleware(['auth', 'role:3'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "tuan"
    Route::get('/tuanrumah', [TuanRumahController::class, 'index'])->name('tuanrumah.home');
    Route::get('/persetujuan', [TuanRumahController::class, 'persetujuan'])->name('tuanrumah.persetujuan');
    Route::get('/tuanrumah/show/{id}', [TuanRumahController::class, 'show'])->name('tuanrumah.show');
    Route::post('/tuanrumah/delete/{id}', [TuanRumahController::class, 'delete'])->name('tuanrumah.delete');
    Route::post('/tuanrumah/approve/{id}', [TuanRumahController::class, 'approve'])->name('tuanrumah.approve');
    Route::post('/tuanrumah/reject/{id}', [TuanRumahController::class, 'reject'])->name('tuanrumah.reject');

    Route::get('/test', [TuanRumahController::class, 'test'])->name('test');
});
Route::middleware(['auth', 'role:4'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "phr"

});
Route::middleware(['auth', 'role:5'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "admin_duri"

});
Route::middleware(['auth', 'role:6'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "security"

});
Route::middleware(['auth', 'role:7'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "admin pku"

});


// Rute untuk logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/redirect', [AuthController::class, 'redirectToProvider']);
Route::get('/google/callback', [AuthController::class, 'handleProviderCallback']);
