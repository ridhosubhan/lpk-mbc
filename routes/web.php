<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\KeuanganController;
use App\Http\Controllers\admin\PendaftaranController;
use App\Http\Controllers\admin\ProfilPegawaiController;
use App\Http\Controllers\admin\ProfilSiswaController;
use App\Http\Controllers\admin\ReferensiPembayaranController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\auth\AkunController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\StatusPendaftaranController;


use App\Http\Controllers\auth\SesiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\user\KeuanganController as UserKeuanganController;
use App\Http\Controllers\user\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar', [DaftarController::class, 'proses_daftar'])->name('daftar-siswa');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

// Controller grouping admin
Route::group(['prefix' => 'admin', 'middleware' => 'userAkses:admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index']);

    Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
    Route::post('/detail-pendaftar', [PendaftaranController::class, 'detail_pendaftar'])->name('/detail-pendaftar');
    Route::post('/terima-pendaftar', [PendaftaranController::class, 'terima_pendaftar'])->name('/terima-pendaftar');
    Route::post('/tolak-pendaftar', [PendaftaranController::class, 'tolak_pendaftar'])->name('/tolak-pendaftar');
    Route::get('/cetak-pdf/{siswa_id}', [PendaftaranController::class, 'cetak_pdf']);

    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/edit/{users_id}', [UsersController::class, 'edit']);
    Route::get('/users/edit-siswa/{users_id}', [UsersController::class, 'edit_siswa']);
    Route::post('/users/update', [UsersController::class, 'update'])->name('users-update');

    Route::get('/profil-siswa', [ProfilSiswaController::class, 'index']);
    Route::get('/profil-siswa/edit/{users_id}', [ProfilSiswaController::class, 'edit']);
    Route::post('/profil-siswa/update', [ProfilSiswaController::class, 'update'])->name('profil-siswa-update');
    Route::post('/profil-siswa/destroy', [ProfilSiswaController::class, 'destroy'])->name('profil-siswa-destroy');

    Route::get('/profil-pegawai', [ProfilPegawaiController::class, 'index']);
    Route::get('/profil-pegawai/edit/{users_id}', [ProfilPegawaiController::class, 'edit']);
    Route::post('/profil-pegawai/update', [ProfilPegawaiController::class, 'update'])->name('profil-pegawai-update');
    Route::post('/profil-pegawai/destroy', [ProfilPegawaiController::class, 'destroy'])->name('profil-pegawai-destroy');

    Route::get('/keuangan', [KeuanganController::class, 'index']);

    Route::get('/referensi-pembayaran', [ReferensiPembayaranController::class, 'index']);
    Route::get('/referensi-pembayaran/create', [ReferensiPembayaranController::class, 'create']);
    Route::post('/referensi-pembayaran/store', [ReferensiPembayaranController::class, 'store'])->name('referensi-pembayaran-create');
    Route::get('/referensi-pembayaran/edit/{id}', [ReferensiPembayaranController::class, 'edit']);
    Route::post('/referensi-pembayaran/update', [ReferensiPembayaranController::class, 'update'])->name('referensi-pembayaran-update');
    Route::post('/referensi-pembayaran/destroy', [ReferensiPembayaranController::class, 'destroy'])->name('referensi-pembayaran-destroy');

    Route::get('/akun', [AkunController::class, 'index']);
    Route::post('/akun-update', [AkunController::class, 'update']);

    Route::get('/logout', [SesiController::class, 'logout']);
});


// Controller grouping user
Route::group(['prefix' => 'user', 'middleware' => 'userAkses:user'], function () {;
    Route::get('/dashboard', [UserController::class, 'index']);
    Route::get('/status-pendaftaran', [StatusPendaftaranController::class, 'index']);
    Route::post('/unggah-bukti-bayar', [StatusPendaftaranController::class, 'unggah_bukti_bayar'])->name('/unggah-bukti-bayar');
    Route::get('/cetak-pdf', [StatusPendaftaranController::class, 'cetak_pdf']);

    Route::get('/profil', [ProfilController::class, 'index']);
    Route::post('/profil-update', [ProfilController::class, 'update'])->name('profil-update');

    Route::get('/akun', [AkunController::class, 'index']);
    Route::post('/akun-update', [AkunController::class, 'update']);

    Route::get('/keuangan', [UserKeuanganController::class, 'index']);

    Route::get('/logout', [SesiController::class, 'logout']);
});
