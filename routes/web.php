<?php

use Illuminate\Support\Facades\Route;
use App\Models\MenuPatient;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MenuPatientController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\AhliGiziController;
use App\Http\Controllers\PetugasDapurController;

/*
|--------------------------------------------------------------------------
| REDIRECT AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | RESOURCE
    |--------------------------------------------------------------------------
    */

    Route::resource('patients', PatientController::class);

    Route::resource('menu-pasien', MenuPatientController::class);
    Route::resource('users', UserManagementController::class);

    /*
    |--------------------------------------------------------------------------
    | STATUS MENU
    |--------------------------------------------------------------------------
    */

    Route::get('/status-menu', [MenuPatientController::class, 'statusMenu'])
        ->name('status-menu');

   Route::post('/status-menu/{id}', [MenuPatientController::class, 'updateStatus'])
    ->name('status-menu.update');

    /*
    |--------------------------------------------------------------------------
    | REDIRECT ROLE
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

    if(auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }

    if(auth()->user()->role == 'dokter') {
        return redirect('/dokter/dashboard');
    }

    if(auth()->user()->role == 'ahli_gizi') {
        return redirect('/gizi/dashboard');
    }

    if(auth()->user()->role == 'petugas_dapur') {
        return redirect('/dapur/dashboard');
    }

})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:dokter'])
->prefix('dokter')
->group(function () {

    Route::get('/dashboard', [DokterController::class, 'dashboard']);

});

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', function () {

    $activities = [];

    return view('dashboard', compact('activities'));

});

    Route::get('/manajemen-user', [UserManagementController::class, 'index'])
        ->name('manajemen-user.index');

    Route::post('/manajemen-user', [UserManagementController::class, 'store'])
        ->name('manajemen-user.store');

    Route::delete('/manajemen-user/{id}', [UserManagementController::class, 'destroy'])
        ->name('manajemen-user.destroy');

        Route::get('/users/{id}', [UserManagementController::class, 'show'])
    ->name('users.show');

Route::get('/users/{id}/edit', [UserManagementController::class, 'edit'])
    ->name('users.edit');

    /*
    |--------------------------------------------------------------------------
    | DOKTER
    |--------------------------------------------------------------------------
    */

    Route::view('/dokter/dashboard', 'dashboard');

    Route::middleware(['auth', 'role:dokter'])
->prefix('dokter')
->group(function () {

    Route::view('/dashboard', 'dokter.dashboard');

    Route::get('/data-pasien', [PatientController::class, 'index'])
        ->name('dokter.pasien');

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('dokter.laporan');
});

    /*
    |--------------------------------------------------------------------------
    | AHLI GIZI
    |--------------------------------------------------------------------------
    */

    Route::view('/gizi/dashboard', 'dashboard');

    Route::get('/laporan', [MenuPatientController::class, 'laporan'])
    ->name('laporan');

    Route::middleware(['auth', 'role:ahli_gizi'])
->prefix('gizi')
->group(function () {

    Route::view('/dashboard', 'gizi.dashboard');

    Route::get('/data-pasien', [PatientController::class, 'index'])
        ->name('gizi.pasien');

    Route::resource('/menu-pasien', MenuPatientController::class);

    Route::get('/status-menu', [StatusMenuController::class, 'index'])
        ->name('gizi.status-menu');

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('gizi.laporan');
});
Route::middleware(['auth', 'role:ahli_gizi'])
->prefix('gizi')
->group(function () {

    Route::get('/dashboard',
        [AhliGiziController::class, 'dashboard'])
        ->name('gizi.dashboard');

        Route::get('/menu-pasien',
    [MenuPatientController::class, 'index'])
    ->name('gizi.menu-pasien');

});

    /*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/

Route::get('/laporan', [MenuPatientController::class, 'laporan'])
    ->name('laporan');

    /*
    |--------------------------------------------------------------------------
    | PETUGAS DAPUR
    |--------------------------------------------------------------------------
    */

    Route::get('/dapur/dashboard',
    [PetugasDapurController::class, 'dashboard'])
    ->name('dapur.dashboard');

});

Route::get('/cetak-label', function () {

    $menus = MenuPatient::with('patient')
                ->latest()
                ->get();

    return view('cetak-label.index', compact('menus'));

})->name('cetak-label');

Route::middleware(['auth', 'role:petugas_dapur'])
->prefix('dapur')
->group(function () {

    Route::get('/dapur/dashboard',
    [PetugasDapurController::class, 'dashboard'])
    ->name('dapur.dashboard');

    Route::get('/status-menu', [StatusMenuController::class, 'index'])
        ->name('dapur.status-menu');

    Route::get('/cetak-label', [LabelController::class, 'index'])
        ->name('dapur.cetak-label');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';