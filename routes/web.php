<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilUserController;
use Illuminate\Support\Facades\Route;

// LANDING PAGE PUBLIK
Route::get('/', [DashboardController::class, 'indexPublic'])->name('public.dashboard');
Route::get('/berita', [BeritaController::class, 'beritaPublic'])->name('public.berita');
Route::get('/berita/{slug}', [BeritaController::class, 'beritaShowPublic'])->name('public.berita.show');
Route::get('/profil', [ProfilSekolahController::class, 'profilPublic'])->name('public.profil');
Route::get('/guru', [GuruController::class, 'guruPublic'])->name('public.guru');
Route::get('/guru/{slug}', [GuruController::class, 'guruShowPublic'])->name('public.guru.show');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'ekstrakurikulerPublic'])->name('public.ekstrakurikuler');
Route::get('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'ekstrakurikulerShowPublic'])->name('public.ekstrakurikuler.show');
Route::get('/galeri', [GaleriController::class, 'galeriPublic'])->name('public.galeri');
Route::get('/galeri/{slug}', [GaleriController::class, 'galeriShowPublic'])->name('public.galeri.show');

// AUTENTIKASI (HANYA BISA DIAKSES JIKA BELUM LOGIN)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/login-proses', [AuthController::class, 'login'])->name('proses.login');
});

// LOGOUT
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// =========================================================================
// ROUTE GROUP ADMIN (WAJIB LOGIN / AUTH MIDDLEWARE)
// =========================================================================
Route::middleware('auth')->prefix('admin')->group(function () {

    // 1. Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.root');

    // 2. Profil Sekolah
    Route::prefix('profil')->group(function () {
        Route::get('/', [ProfilSekolahController::class, 'index'])->name('admin.profil.index');
        Route::get('/edit/{id}', [ProfilSekolahController::class, 'edit'])->name('admin.profil.edit');
        Route::put('/update/{id}', [ProfilSekolahController::class, 'update'])->name('admin.profil.update');
    });

    // 3. Berita
    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
        Route::get('/add-edit/{id?}', [BeritaController::class, 'addEdit'])->name('admin.berita.addEdit');
        Route::post('/save/{id?}', [BeritaController::class, 'save'])->name('admin.berita.save');
        Route::get('/{id}', [BeritaController::class, 'show'])->name('admin.berita.show');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');
    });

    // 4. Ekstrakurikuler
    Route::prefix('ekstrakurikuler')->group(function () {
        Route::get('/', [EkstrakurikulerController::class, 'index'])->name('admin.ekstrakurikuler.index');
        Route::get('/add-edit/{id?}', [EkstrakurikulerController::class, 'addEdit'])->name('admin.ekstrakurikuler.addEdit');
        Route::post('/save/{id?}', [EkstrakurikulerController::class, 'save'])->name('admin.ekstrakurikuler.save');
        Route::get('/{id}', [EkstrakurikulerController::class, 'show'])->name('admin.ekstrakurikuler.show');
        Route::delete('/{id}', [EkstrakurikulerController::class, 'destroy'])->name('admin.ekstrakurikuler.delete');
    });

    // 5. Galeri
    Route::prefix('galeri')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri.index');
        Route::get('/add-edit/{id?}', [GaleriController::class, 'addEdit'])->name('admin.galeri.addEdit');
        Route::post('/save/{id?}', [GaleriController::class, 'save'])->name('admin.galeri.save');
        Route::get('/{id}', [GaleriController::class, 'show'])->name('admin.galeri.show');
        Route::delete('/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.delete');
    });

    // Profil User
    Route::get('/profil-user', [ProfilUserController::class, 'index'])->name('admin.profilUser.index');
    Route::get('/profil-user/edit', [ProfilUserController::class, 'edit'])->name('admin.profilUser.edit');
    Route::put('/profil-user/update', [ProfilUserController::class, 'update'])->name('admin.profilUser.update');

    // =====================================================================
    // FITUR KHUSUS ADMIN (Operator DILARANG)
    // =====================================================================
    Route::middleware('role:admin')->group(function () {

        // User
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/add-edit/{id?}', [UserController::class, 'addEdit'])->name('admin.user.addEdit');
            Route::post('/save/{id?}', [UserController::class, 'save'])->name('admin.user.save');
            Route::get('/{id}', [UserController::class, 'show'])->name('admin.user.show');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
        });

        // 6. Guru
        Route::prefix('guru')->group(function () {
            Route::get('/', [GuruController::class, 'index'])->name('admin.guru.index');
            Route::get('/add-edit/{id?}', [GuruController::class, 'addEdit'])->name('admin.guru.addEdit');
            Route::post('/save/{id?}', [GuruController::class, 'save'])->name('admin.guru.save');
            Route::get('/{id}', [GuruController::class, 'show'])->name('admin.guru.show');
            Route::delete('/{id}', [GuruController::class, 'destroy'])->name('admin.guru.delete');
        });

        // 7. Siswa
        Route::prefix('siswa')->group(function () {
            Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa.index');
            Route::get('/add-edit/{id?}', [SiswaController::class, 'addEdit'])->name('admin.siswa.addEdit');
            Route::post('/save/{id?}', [SiswaController::class, 'save'])->name('admin.siswa.save');
            Route::get('/{id}', [SiswaController::class, 'show'])->name('admin.siswa.show');
            Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.delete');
        });

    });

});

