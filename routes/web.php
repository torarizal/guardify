<?php
use App\models\Jadwal;
use App\Models\Petugas;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\SchedulingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'komandan') {
        return redirect('/komandan/dashboard');
    }
    return redirect('/petugas/dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/komandan/dashboard', function () {

    $totalPetugas = Petugas::count();
    $totalJadwalHariIni = Jadwal::count();

    $jadwals = Jadwal::with('petugas.user')
        ->orderBy('tanggal')
        ->get();

    return view('komandan.dashboard', compact(
        'totalPetugas',
        'totalJadwalHariIni',
        'jadwals'
    ));
});

Route::get('/petugas/dashboard', function () {
    return view('petugas.dashboard');
})->middleware('auth')->name('petugas.dashboard');

Route::resource('users', UserController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('availability', AvailabilityController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/availability', [AvailabilityController::class, 'index'])->name('availability.index');
    Route::post('/availability', [AvailabilityController::class, 'store'])->name('availability.store');
});


Route::post('/generate-schedule', [SchedulingController::class, 'generate'])
    ->middleware('auth')
    ->name('schedule.generate');

require __DIR__.'/auth.php';
