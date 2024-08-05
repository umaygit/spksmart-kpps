<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\PendaftarViewController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\HasilAkhirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengumumanController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('pendaftaran', [PendaftarController::class, 'create'])->name('pendaftaran');
    Route::post('pendaftaran', [PendaftarController::class, 'store'])->name('pendaftaran');


    Route::get('pendaftar/login', [PendaftarController::class, 'showLoginForm'])->name('pendaftar.login');
    Route::post('pendaftar/login', [PendaftarController::class, 'loginDaftar'])->name('pendaftar.login.proses');
    Route::post('pendaftar/logout', [PendaftarController::class, 'logout'])->name('pendaftar.logout');

    Route::get('/pendaftar/pengumuman', [PendaftarController::class, 'showPengumuman'], function() { return view('pengumuman');
    })->name('pendaftar.pengumuman')->middleware('auth:pendaftar');

    Route::get('/pendaftar/pengumuman-export', [PengumumanController::class, 'cetakpengumuman'])->name('pengumuman-export.cetakpengumuman')->middleware('auth:pendaftar');




    Route::get('pendaftar/create', [PendaftarController::class, 'create'])->name('pendaftar.create');
    Route::post('pendaftar/store', [PendaftarController::class, 'store'])->name('pendaftar.store');




Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'] , function(){

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        Route::resource('kriteria', KriteriaController::class);
        Route::resource('subkriteria', SubKriteriaController::class);
        Route::resource('alternatifs', AlternatifController::class);
        Route::get('alternatifs/filter', [AlternatifController::class, 'filter'])->name('alternatifs.filter');

        Route::get('pendaftar', [PendaftarViewController::class, 'index'])->name('pendaftar.index');
        Route::get('pendaftar/create', [PendaftarController::class, 'create'])->name('pendaftar.create');
        Route::delete('pendaftar/{id}', [PendaftarViewController::class, 'destroy'])->name('pendaftar.destroy');
        Route::get('pendaftar/edit/{id}', [PendaftarViewController::class, 'edit'])->name('pendaftar.edit');
        Route::put('pendaftar/update/{id}', [PendaftarViewController::class, 'update'])->name('pendaftar.update');

        Route::resource('penilaians', PenilaianController::class);
        Route::get('penilaian/{id}', [PenilaianController::class, 'show'])->name('penilaian.show');
        Route::get('penilaian/exportexcel', [PenilaianController::class, 'exportExcel'])->name('penilaian.exportexcel');


        // Route::get('perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
        Route::get('perhitungan', [PerhitunganController::class, 'calculateAndReturnView'])->name('perhitungan.index');
        // Route::get('perhitungan/view', [PerhitunganController::class, 'view'])->name('perhitungan.view');

        Route::get('perhitungan/calculate/', [PerhitunganController::class, 'calculateAndReturnView'])->name('perhitungan.calculate');

        Route::get('hasil-akhir', [HasilAkhirController::class, 'calculateAndReturnView'])->name('hasil-akhir.index');
        Route::get('hasil-akhir/calculate', [HasilAkhirController::class, 'calculateAndReturnView'])->name('hasil-akhir.calculate');
        Route::get('hasil-akhir/cetakdata', [HasilAkhirController::class, 'cetakdata'])->name('hasil-akhir.cetakdata');

        Route::get('pendaftar/exportexcel', [PendaftarViewController::class, 'exportExcel'])->name('pendaftar.exportexcel');

        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

});










