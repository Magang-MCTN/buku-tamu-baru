<?php

use App\Http\Controllers\AdminDuriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhrController;
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
    return view('home');
});
// Route::get('/pengajuan-tamu', [TamuController::class, 'createForm'])->name('tamu.create');
Route::post('/pengajuan-tamu', [TamuController::class, 'store'])->name('tamu.store');
Route::get('/pengajuan-tamu/create', [TamuController::class, 'create'])->name('tamu.create');
Route::get('/pengajuan-tamu2', [TamuController::class, 'surat2'])->name('tamu.surat2');
Route::post('/datatamu', [TamuController::class, 'datatamu'])->name('datatamu.store');
Route::post('/simpanTamu', [TamuController::class, 'simpanTamu'])->name('simpanTamu');
Route::get('/pilih-kendaraan', [TamuController::class, 'pilihKendaraan'])->name('pilih.kendaraan');
Route::post('/simpankendaraan', [TamuController::class, 'simpankendaraan'])->name('simpankendaraan');
Route::get('/kendaraan', [TamuController::class, 'kendaraan'])->name('kendaraan');
Route::post('/pengawalan', [TamuController::class, 'simpankendaraan'])->name('pengawalan');

Route::get('/kode-unik/{surat1_id}', [TamuController::class, 'tampilKodeUnik'])->name('kodeUnik');

Route::get('/status', [TamuController::class, 'status'])->name('status');
Route::post('/status/cari', [TamuController::class, 'cariStatus'])->name('cari-status');
Route::get('/surat2/{id_surat_2_duri}', [TamuController::class, 'show'])->name('surat2.show');


Route::get('/mctn', [DashboardController::class, 'index'])->name('home')->middleware('auth');
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
    Route::get('/phr', [PhrController::class, 'index'])->name('phr.home');

    Route::post('/phr/approve/{id_surat_2_duri}', [PHRController::class, 'approve'])->name('phr.approve');
    Route::post('/phr/reject/{id_surat_2_duri}', [PHRController::class, 'reject'])->name('phr.reject');
    Route::get('/phr/surat2/{id_surat_2_duri}', [PHRController::class, 'show'])->name('phr.surat2.show');
});
Route::middleware(['auth', 'role:5'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "admin_duri"
    Route::get('/admin_duri', [AdminDuriController::class, 'index'])->name('admin_duri.dashboard');
    Route::get('/admin_duri/surat2/{id}', [AdminDuriController::class, 'show'])->name('admin_duri.surat2.show');
    Route::post('/admin_duri/approve/{id}', [AdminDuriController::class, 'approve'])->name('admin_duri.approve');
    Route::post('/admin_duri/reject/{id}', [AdminDuriController::class, 'reject'])->name('admin_duri.reject');
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
