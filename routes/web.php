<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();

        if ($user->isAdminLevel()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isBendahara()) {
            return redirect()->route('bendahara.dashboard');
        } elseif ($user->isPendeta()) {
            return redirect()->route('pendeta.dashboard');
        }

        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('login');
});

require __DIR__ . '/auth.php';

// Login per Role For Admin
Route::middleware(['auth'])->group(function () {
    // Redirect based on role
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isBendahara()) {
            return redirect()->route('bendahara.dashboard');
        } elseif ($user->isPendeta()) {
            return redirect()->route('pendeta.dashboard');
        }

        return redirect()->route('admin.dashboard');
    })->name('dashboard');
});

// Route for Admin and Superadmin
Route::middleware(['auth', 'role:superadmin,admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// User Management - Only For Superadmin

Route::middleware(['auth', 'role:superadmin'])->prefix('admin/manajemen-user')->name('admin.user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/user-baru', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{user}', [UserController::class, 'edit'])->name('show');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
});

// Route Bendahara Only
Route::middleware(['auth', 'role:bendahara'])->prefix('bendahara')->name('bendahara.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:pendeta'])->prefix('pendeta')->name('pendeta.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
