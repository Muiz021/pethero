<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\front\AkunController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\back\DashboardController;
use App\Http\Controllers\front\KirimHewanController;
use App\Http\Controllers\front\FrontLokasiController;
use App\Http\Controllers\back\BackKirimHewanController;

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

// Frontend(Client site)
Route::name('front.')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::prefix('detail')->group(function(){
        Route::get('/kirim-hewan-1',[KirimHewanController::class,'detail_pengirim1'])->name('kirim-hewan1');
        Route::get('/kirim-hewan-2',[KirimHewanController::class,'detail_pengirim2'])->name('kirim-hewan2');
        Route::post('/kirim-hewan-2',[KirimHewanController::class,'store'])->name('kirim-hewan.store');
        Route::get('/alamat',[KirimHewanController::class,'detail_alamat'])->name('detail-alamat');
        Route::post('/alamat',[FrontLokasiController::class,'store'])->name('alamat.store');
        Route::get('/pembayaran/{id}',[KirimHewanController::class,'detail_pembayaran'])->name('detail-pembayaran');
    });

    Route::prefix('akun')->group(function(){
        Route::get('/',[AkunController::class,'index'])->name('akun');
        Route::get('/daftar',[AkunController::class,'daftar'])->name('daftar');
        Route::post('/daftar',[AkunController::class,'proses_daftar'])->name('proses_daftar');
        Route::get('/{slug}/edit',[AkunController::class,'edit'])->name('edit');
        Route::put('/{slug}/update',[AkunController::class,'update'])->name('update');
        Route::get('/masuk',[AkunController::class,'masuk'])->name('masuk');
        Route::get('/tentang-kami',[AkunController::class,'tentang_kami'])->name('tentang-kami');
        Route::get('/riwayat-pengiriman',[AkunController::class,'riwayat_pengiriman'])->name('riwayat-pengiriman');

        // AuthController
        Route::post('/masuk',[AuthController::class,'proses_login'])->name('proses_login');
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
        Route::get('notifikasi-user', function(){
            return view('front.pages.email.notifikasi-user');
        });
    });
});

// Backend(Admin)
Route::prefix('admin')->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('user', UserController::class)->except(['create','store','edit','update']);
    Route::resource('kirim-hewan',BackKirimHewanController::class)->except(['create','store','edit']);
});
