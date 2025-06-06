<?php

use App\Http\Controllers\Admin\AlternatifController as AdminAlternatifController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KriteriaController as AdminKriteriaController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\PerhitunganController as AdminPerhitunganController;
use App\Http\Controllers\Admin\SubKriteriaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\AlternatifController as UserAlternatifController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\KriteriaController as UserKriteriaController;
use App\Http\Controllers\User\PerhitunganController as UserPerhitunganController;
use Illuminate\Support\Facades\Route;

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

// Redirect root to login page
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Redirect authenticated user to appropriate dashboard
Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware('auth')->name('dashboard');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Kriteria
    Route::get('/kriteria', [AdminKriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('/kriteria/create', [AdminKriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria', [AdminKriteriaController::class, 'store'])->name('kriteria.store');

    // PENTING: Bulk delete HARUS sebelum route dengan parameter {kriteria}
    Route::delete('/kriteria/bulk-delete', [AdminKriteriaController::class, 'bulkDelete'])->name('kriteria.bulk-delete');

    Route::get('/kriteria/{kriteria}/edit', [AdminKriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/{kriteria}', [AdminKriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/{kriteria}', [AdminKriteriaController::class, 'destroy'])->name('kriteria.destroy');

    // Sub Kriteria
    Route::get('/subkriteria', [SubKriteriaController::class, 'index'])->name('subkriteria.index');
    Route::get('/subkriteria/create', [SubKriteriaController::class, 'create'])->name('subkriteria.create');
    Route::post('/subkriteria', [SubKriteriaController::class, 'store'])->name('subkriteria.store');
    Route::get('/subkriteria/{subKriteria}/edit', [SubKriteriaController::class, 'edit'])->name('subkriteria.edit');
    Route::put('/subkriteria/{subKriteria}', [SubKriteriaController::class, 'update'])->name('subkriteria.update');
    Route::delete('/subkriteria/{subKriteria}', [SubKriteriaController::class, 'destroy'])->name('subkriteria.destroy');

    // Alternatif
    Route::get('/alternatif', [AdminAlternatifController::class, 'index'])->name('alternatif.index');
    Route::get('/alternatif/create', [AdminAlternatifController::class, 'create'])->name('alternatif.create');
    Route::post('/alternatif', [AdminAlternatifController::class, 'store'])->name('alternatif.store');

    // BULK DELETE HARUS SEBELUM ROUTE DENGAN PARAMETER {alternatif}
    Route::delete('/alternatif/bulk-delete', [AdminAlternatifController::class, 'bulkDelete'])->name('alternatif.bulk-delete');

    Route::get('/alternatif/{alternatif}/edit', [AdminAlternatifController::class, 'edit'])->name('alternatif.edit');
    Route::put('/alternatif/{alternatif}', [AdminAlternatifController::class, 'update'])->name('alternatif.update');
    Route::delete('/alternatif/{alternatif}', [AdminAlternatifController::class, 'destroy'])->name('alternatif.destroy');

    // Penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/penilaian/create', [PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('/penilaian/{alternatif}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
    Route::put('/penilaian/{alternatif}', [PenilaianController::class, 'update'])->name('penilaian.update');
    Route::delete('/penilaian/{alternatif}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');

    // Perhitungan
    Route::get('/perhitungan', [AdminPerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::post('/perhitungan/calculate', [AdminPerhitunganController::class, 'calculate'])->name('perhitungan.calculate');
    Route::get('/perhitungan/{id}', [AdminPerhitunganController::class, 'show'])->name('perhitungan.show');
    Route::delete('/perhitungan/{id}', [AdminPerhitunganController::class, 'destroy'])->name('perhitungan.destroy');

    // User Management
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

// User Routes
Route::prefix('user')->middleware(['auth', 'user'])->name('user.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // Kriteria
    Route::get('/kriteria', [UserKriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('/kriteria/{kriteria}', [UserKriteriaController::class, 'show'])->name('kriteria.show');

    // Alternatif
    Route::get('/alternatif', [UserAlternatifController::class, 'index'])->name('alternatif.index');
    Route::get('/alternatif/{alternatif}', [UserAlternatifController::class, 'show'])->name('alternatif.show');

    // Perhitungan
    Route::get('/perhitungan', [UserPerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::get('/perhitungan/create', [UserPerhitunganController::class, 'create'])->name('perhitungan.create');
    Route::post('/perhitungan/calculate', [UserPerhitunganController::class, 'calculate'])->name('perhitungan.calculate');
    Route::get('/perhitungan/{id}', [UserPerhitunganController::class, 'show'])->name('perhitungan.show');
    Route::delete('/perhitungan/{id}', [UserPerhitunganController::class, 'destroy'])->name('perhitungan.destroy');
});
// Rute cetak untuk admin
Route::get('/admin/perhitungan/cetak/{id}', [App\Http\Controllers\Admin\PerhitunganController::class, 'cetak'])
    ->name('admin.perhitungan.cetak');

// Rute cetak untuk user biasa
Route::get('/user/perhitungan/cetak/{id}', [App\Http\Controllers\User\PerhitunganController::class, 'cetak'])
    ->name('user.perhitungan.cetak');


