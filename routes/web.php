<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesaController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\RelawanController;
use App\Http\Controllers\Admin\StatusLokasiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LokasiController as UserLokasiController;
use App\Http\Controllers\User\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/lokasis', [UserLokasiController::class,'index'])->name('lokasi.index');
Route::get('/lokasi/{id}', [UserLokasiController::class,'show'])->name('lokasi.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/create-lokasi', [UserLokasiController::class,'create'])->name('lokasi.create');
    Route::post('/create-lokasi', [UserLokasiController::class,'store'])->name('lokasi.store');
    Route::get('/lokasi-success', [UserLokasiController::class,'success'])->name('lokasi.success');

    Route::get('/my-lokasi', [UserLokasiController::class,'myLokasi'])->name('lokasi.mylokasi');
});

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store'])->name('login.store');
Route::post('/logout', [LoginController::class,'logout'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
// Route::post('/logout', [RegisterController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware('auth','role:admin')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('/relawan', RelawanController::class);
    Route::resource('/desa', DesaController::class);
    Route::resource('/lokasi', LokasiController::class);

    Route::get('/status-lokasi/{lokasiId}/create', [StatusLokasiController::class,'create'])->name('status-lokasi.create');
    Route::resource('/status-lokasi', StatusLokasiController::class)->except('create');
});



