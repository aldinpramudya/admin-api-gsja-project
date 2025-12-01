<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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
    // Article Routes
    Route::get('/manajemen-artikel', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/manajemen-artikel/artikel-baru', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/manajemen-artikel', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/manajemen-artikel/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/manajemen-artikel/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/manajemen-artikel/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    // Article Routes End

    // Tag Routes
    Route::get('/manajemen-tag-artikel', [TagController::class, 'index'])->name('tag.index');
    Route::get('/manajemen-tag-artikel/tag-baru', [TagController::class, 'create'])->name('tag.create');
    Route::post('/manajemen-tag-artikel', [TagController::class, 'store'])->name('tag.store');
    Route::get('/manajemen-tag-artikel/{tag}', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/manajemen-tag-artikel/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/manajemen-tag-artikel/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
    // Tag Routes End
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

// Route Pendeta Only
Route::middleware(['auth', 'role:pendeta'])->prefix('pendeta')->name('pendeta.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
