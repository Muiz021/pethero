<?php

use App\Http\Controllers\front\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\KirimHewanController;

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
    Route::get('/detail-kirim-hewan-1',[KirimHewanController::class,'detail_pengirim1'])->name('kirim-hewan1');
    Route::get('/detail-kirim-hewan-2',[KirimHewanController::class,'detail_pengirim2'])->name('kirim-hewan2');
    Route::get('/detail-alamat',[KirimHewanController::class,'detail_alamat'])->name('detail-alamat');

    Route::get('/akun',[AkunController::class,'index'])->name('akun');
    
});


