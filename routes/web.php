<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\back\KurirController;
use App\Http\Controllers\front\AkunController;
use App\Http\Controllers\front\HomeController;

use App\Http\Controllers\back\DashboardController;
use App\Http\Controllers\front\KirimHewanController;
use App\Http\Controllers\front\FrontLokasiController;
use App\Http\Controllers\back\BackKirimHewanController;
use App\Http\Controllers\back\KonfirmasiPembayaranController;

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

Route::prefix('akun')->group( function(){
    Route::get('/masuk',[AkunController::class,'masuk'])->name('masuk');
    Route::post('/masuk',[AuthController::class,'proses_login'])->name('proses_login');
});


// Frontend(Client site)
Route::name('front.')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::namespace('hanya untuk user')->prefix('detail')->middleware(['auth','OnlyUser'])->group(function(){
        ##kirim hewan##
        Route::get('/kirim-hewan-1',[KirimHewanController::class,'detail_pengirim1'])->name('kirim-hewan1');
        Route::get('/kirim-hewan-2',[KirimHewanController::class,'detail_pengirim2'])->name('kirim-hewan2');
        Route::post('/kirim-hewan-2',[KirimHewanController::class,'store'])->name('kirim-hewan.store');

        ##pembayaran##
        Route::get('/pembayaran/{id}',[KirimHewanController::class,'detail_pembayaran'])->name('detail-pembayaran');
        Route::get('/pembayaran-2/{id}',[KirimHewanController::class,'detail_pembayaran_2'])->name('detail-pembayaran');
        Route::put('/pembayaran/{id}/update',[KirimHewanController::class,'update_metode_pembayaran'])->name('update-metode-pembayaran');
        Route::put('/bukti-pembayaran/{id}/update',[KirimHewanController::class,'update_gambar_pembayaran'])->name('upload-bukti-pembayaran');
        ##end pembayaran##

        ##alamat##
        Route::get('/alamat',[FrontLokasiController::class,'list_alamat'])->name('detail-alamat');
        Route::get('/create-alamat',[FrontLokasiController::class,'create'])->name('alamat.create');
        Route::post('/alamat',[FrontLokasiController::class,'store'])->name('alamat.store');
        Route::put('/update-status-alamat',[FrontLokasiController::class,'select_alamat'])->name('alamat.update');
        ##end alamat##

    });

    Route::prefix('akun')->group(function(){
        ##umum##
        Route::get('/',[AkunController::class,'index'])->name('akun');
        Route::get('/daftar',[AkunController::class,'daftar'])->name('daftar');
        Route::post('/daftar',[AkunController::class,'proses_daftar'])->name('proses_daftar');
        Route::get('/tentang-kami',[AkunController::class,'tentang_kami'])->name('tentang-kami');
        ##end umum##

        ##user##
        Route::get('/daftar-user',[AkunController::class,'daftar_user'])->name('daftar-user');

        Route::namespace('hanya untuk user')->middleware(['auth','OnlyUser'])->group( function(){
            Route::get('/{slug}/edit',[AkunController::class,'edit'])->name('edit');
            Route::put('/{slug}/update',[AkunController::class,'update'])->name('update');
            Route::get('/riwayat-pengiriman',[AkunController::class,'riwayat_pengiriman_member'])->name('riwayat-pengiriman-member');
            Route::get('/logout',[AuthController::class,'logout'])->name('logout.user');
        });
        ##end user##
    });
});

// Kurir
Route::namespace('menu untuk kurir')->prefix('kurir')->group(function(){
    Route::get('/daftar-kurir',[AkunController::class,'daftar_kurir'])->name('daftar-kurir');
    Route::post('/daftar-kurir',[AkunController::class,'proses_daftar_kurir'])->name('proses-daftar-kurir');
    Route::middleware(['auth','OnlyKurir'])->group(function() {
        Route::get('riwayat-pengiriman',[AkunController::class,'riwayat_pengiriman_kurir'])->name('riwayat_pengiriman_kurir');
        Route::get('detail-riwayat-pengiriman/{id}',[KirimHewanController::class,'detail_riwayat_pengiriman'])->name('kurir.detail-kirim-hewan');
        Route::put('update-status-pengiriman/{id}',[KirimHewanController::class,'update_status_pengiriman'])->name('update-status-pengiriman');
        Route::get('{slug}/edit',[AkunController::class,'edit_kurir'])->name('edit_kurir');
        Route::put('{slug}/update',[AkunController::class,'update_kurir'])->name('update_kurir');
    });
});

// Backend(Admin)
Route::prefix('admin')->middleware(['auth','OnlyAdmin'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('user', UserController::class)->except(['create','store','edit','update']);
    Route::resource('kurir', KurirController::class)->except(['create','store','edit','show']);
    ##kirim hewan##
    Route::prefix('kirim-hewan')->group(function(){
        // konfirmasi pembayaran
        Route::resource('konfirmasi-pembayaran',KonfirmasiPembayaranController::class)->except(['create','store','edit','show']);
        Route::resource('berhasil',BackKirimHewanController::class)->except(['create','store','edit','show']);
    });
    ##end kirim hewan##

    Route::get('logout',[AuthController::class,'logout'])->name('logout.admin');
});
