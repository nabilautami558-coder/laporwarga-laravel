
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    $pengaduans = \App\Models\Pengaduan::where(
        'user_id',
        auth()->id()
    )->latest()->get();

    return view('dashboard', compact('pengaduans'));
})->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard utama admin
    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    // Halaman khusus daftar pengaduan
    Route::get('/pengaduan', [AdminController::class, 'pengaduan'])
        ->name('admin.pengaduan');

    // Memperbarui status pengaduan
    Route::patch('/pengaduan/{id}/status', [AdminController::class, 'updateStatus'])
        ->name('admin.pengaduan.updateStatus');
});

Route::middleware('auth')->group(function () {
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
        ->name('pengaduan.create');

    Route::post('/pengaduan', [PengaduanController::class, 'store'])
        ->name('pengaduan.store');

    Route::get('/pengaduan', [PengaduanController::class, 'index'])
        ->name('pengaduan.index');

    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])
        ->name('pengaduan.show');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});