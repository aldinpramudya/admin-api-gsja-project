<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GerejaController;
use App\Http\Controllers\Admin\PendetaController;
use App\Http\Controllers\Admin\PosisiPanitiaController;
use App\Http\Controllers\Admin\SusunanPanitiaController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Bendahara\PendetaBendaharaController;
use App\Http\Controllers\ProfileController;
use App\Models\Event;
use App\Models\PosisiPanitia;
use App\Models\SusunanPanitia;
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

    // Route Pendeta
    Route::get('/manajemen-data-pendeta', [PendetaController::class, 'index'])->name('pendeta.index');
    Route::get('/manajemen-data-pendeta/data-baru', [PendetaController::class, 'create'])->name('pendeta.create');
    Route::post('/manajemen-data-pendeta', [PendetaController::class, 'store'])->name('pendeta.store');
    Route::get('/manajemen-data-pendeta/{pendeta}', [PendetaController::class, 'edit'])->name('pendeta.edit');
    Route::put('/manajemen-data-pendeta/{pendeta}', [PendetaController::class, 'update'])->name('pendeta.update');
    Route::delete('/manajemen-data-pendeta/{pendeta}', [PendetaController::class, 'destroy'])->name('pendeta.destroy');
    // Route Pendeta End

    // Route Gereja
    Route::get('/manajemen-data-gereja', [GerejaController::class, 'index'])->name('gereja.index');
    Route::get('/manajemen-data-gereja/data-baru', [GerejaController::class, 'create'])->name('gereja.create');
    Route::post('/manajemen-data-gereja', [GerejaController::class, 'store'])->name('gereja.store');
    Route::get('/manajemen-data-gereja/{gereja}', [GerejaController::class, 'edit'])->name('gereja.edit');
    Route::put('/manajemen-data-gereja/{gereja}', [GerejaController::class, 'update'])->name('gereja.update');
    Route::delete('/manajemen-data-gereja/{gereja}', [GerejaController::class, 'destroy'])->name('gereja.destroy');
    // Route Gereja End

    // Route Event
    Route::get('/manajemen-event', [EventController::class, 'index'])->name('event.index');
    Route::get('/manajemen-event/data-baru', [EventController::class, 'create'])->name('event.create');
    Route::post('/manajemen-event', [EventController::class, 'store'])->name('event.store');
    Route::get('/manajemen-event/{event}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/manajemen-event/{event}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/manajemen-event/{event}', [EventController::class, 'destroy'])->name('event.destroy');
    // Route Event

    // Route Posisi / Role Panitia
    Route::get('/manajemen-posisi-panitia', [PosisiPanitiaController::class, 'index'])->name('posisiPanitia.index');
    Route::get('/manajemen-posisi-panitia/data-baru', [PosisiPanitiaController::class, 'create'])->name('posisiPanitia.create');
    Route::post('/manajemen-posisi-panitia', [PosisiPanitiaController::class, 'store'])->name('posisiPanitia.store');
    Route::get('/manajemen-posisi-panitia/{posisiPanitia}', [PosisiPanitiaController::class, 'edit'])->name('posisiPanitia.edit');
    Route::put('/manajemen-posisi-panitia/{posisiPanitia}', [PosisiPanitiaController::class, 'update'])->name('posisiPanitia.update');
    Route::delete('/manajemen-posisi-panitia/{posisiPanitia}', [PosisiPanitiaController::class, 'destroy'])->name('posisiPanitia.destroy');
    // Route Posisi / Role Panitia End

    // Route Susunan Anggota Panitia
    Route::get('/manajemen-susunan-panitia', [SusunanPanitiaController::class, 'index'])->name('susunanPanitia.index');
    Route::get('/manajemen-susunan-panitia/data-baru', [SusunanPanitiaController::class, 'create'])->name('susunanPanitia.create');
    Route::post('/manajemen-susunan-panitia', [SusunanPanitiaController::class, 'store'])->name('susunanPanitia.store');
    Route::get('/manajemen-susunan-panitia/{susunanPanitia}', [SusunanPanitiaController::class, 'edit'])->name('susunanPanitia.edit');
    Route::put('/manajemen-susunan-panitia/{susunanPanitia}', [SusunanPanitiaController::class, 'update'])->name('susunanPanitia.update');
    Route::delete('/manajemen-susunan-panitia/{susunanPanitia}', [SusunanPanitiaController::class, 'destroy'])->name('susunanPanitia.destroy');
    // Route Susunan Anggota Panitia End


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
     // Route Pendeta
    Route::get('/manajemen-data-pendeta', [PendetaBendaharaController::class, 'index'])->name('pendeta.index');
    Route::get('/manajemen-data-pendeta/{pendeta}', [PendetaBendaharaController::class, 'edit'])->name('pendeta.edit');
    Route::put('/manajemen-data-pendeta/{pendeta}', [PendetaBendaharaController::class, 'update'])->name('pendeta.update');
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
