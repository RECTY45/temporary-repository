<?php

use App\Enum\UserRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('loginProcess');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('registerProcess');
});
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Guest Route
Route::view('/', 'landing.index');
Route::view('/bengkels', 'landing.bengkels.grid');

// Dashboard Redirect
Route::redirect('/dashboards', '/dashboard-redirect');
Route::get('/dashboard-redirect', function () {
    $user = Auth::user();

    if (! $user) {
        return redirect()->route('login');
    }

    return match ($user->role) {
        UserRole::ADMIN   => redirect('/dashboard/admin'),
        UserRole::BENGKEL => redirect('/dashboard/bengkel'),
        UserRole::PUBLIC  => redirect('/dashboard/public'),
        default           => abort(403, 'Unauthorized'),
    };
})->middleware('auth')->name('dashboard');

// Admin
Route::prefix('dashboard/admin')->middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('akun/admin')->middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.akun');
    Route::get('/create', [UserController::class, 'create'])->name('admin.create');
    Route::post('/store', [UserController::class, 'store'])->name('admin.store');
    Route::get('/edit/{akun}', [UserController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{akun}', [UserController::class, 'update'])->name('admin.update');
    Route::delete('delete/{akun}', [UserController::class, 'destroy'])->name('admin.destroy');
});
Route::prefix('akun/pengguna')->middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/edit/{pengguna}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::put('/update/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/delete/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
});

// Public User
Route::prefix('dashboard/public')->middleware(['auth', 'role:PUBLIC'])->group(function () {
    Route::get('/', fn() => view('dashboard.user.index'));
});

// Admin Bengkel
Route::prefix('dashboard/bengkel')->middleware(['auth', 'role:BENGKEL'])->group(function () {
    Route::get('/', fn() => view('dashboard.bengkel.index'));
});
