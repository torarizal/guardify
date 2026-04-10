<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Jadwal;
use App\Models\Petugas;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    // redirect dashboard
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'komandan'
            ? redirect()->route('komandan.dashboard')
            : redirect()->route('petugas.dashboard');
    })->name('dashboard');

    // dashboard
    Route::get('/komandan/dashboard', [DashboardController::class, 'komandan'])
        ->name('komandan.dashboard');

    Route::get('/petugas/dashboard', [DashboardController::class, 'petugas'])
        ->name('petugas.dashboard');

    // history
    Route::get('/history', [HistoryController::class, 'history'])
        ->name('history.history');

     // rekap
    Route::get('/rekap', [RekapController::class, 'rekap'])
        ->name('rekap.rekap');

    // users
    Route::resource('users', UserController::class);

    // availability
    Route::resource('availability', AvailabilityController::class);

    // scheduling
    Route::post('/generate-schedule', [SchedulingController::class, 'generate'])
        ->name('schedule.generate');

    // PETUGAS
    Route::get('/absensi', [AbsensiController::class, 'index'])
        ->name('absensi.index');

    Route::post('/absensi', [AbsensiController::class, 'store'])
        ->name('absensi.store');

    // KOMANDAN
    Route::get('/monitor-absensi', [AbsensiController::class, 'monitor'])
        ->name('absensi.monitor');



    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
