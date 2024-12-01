<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CucianController;
use App\Http\Controllers\LaundrykuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi.tampil');
    Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');
    
    Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
});


Route::middleware('auth')->group( function() {
    
    Route::get('/', [LaundrykuController::class, 'tampilcucian'])->name('laundryku.laundrykuu');
    Route::get('/harga', [LaundrykuController::class, 'harga'])->name('laundryku.harga');
    Route::get('/pemasukan', [LaundrykuController::class, 'pemasukan'])->name('laundryku.pemasukan');
    Route::get('/pengeluaran', [PengeluaranController::class, 'tampil'])->name('pengeluaran.tampil');

    Route::get('/pengeluaran/tambah', [PengeluaranController::class, 'tambah'])->name('pengeluaran.tambah');
    Route::post('/pengeluaran/submit', [PengeluaranController::class, 'submit'])->name('pengeluaran.submit');
    Route::get('/pengeluaran/edit{id}', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
    Route::post('/pengeluaran/update{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::post('/pengeluaran/delete{id}', [PengeluaranController::class, 'delete'])->name('pengeluaran.delete');

    Route::get('/cucianku',[CucianController::class,'tampil'])->name('cucianku.tampil');
    Route::get('/cucianku/tambah',[CucianController::class,'tambah'])->name('cucianku.tambah');
    Route::get('/cucianku/tambahlama',[CucianController::class,'tambahlama'])->name('cucianku.tambahlama');
    Route::post('/cucianku/submit',[CucianController::class,'submit'])->name('cucianku.submit');
    Route::get('/cucianku/edit/{id}',[CucianController::class,'edit'])->name('cucianku.edit');
    Route::post('/cucianku/update/{id}',[CucianController::class,'update'])->name('cucianku.update');
    Route::post('/cucianku/delete/{id}',[CucianController::class,'delete'])->name('cucianku.delete');
    Route::patch('/cucianku/{id}/ubah-status', [CucianController::class, 'ubahstatus'])->name('cucianku.ubahstatus'); 

    Route::get('/pelangganku',[CucianController::class,'tampilpelanggan'])->name('pelangganku.tampil');
    Route::get('/pelangganku/edit/{id}',[PelangganController::class,'edit'])->name('pelangganku.edit');
    Route::post('/pelangganku/update/{id}',[PelangganController::class,'update'])->name('pelangganku.update');
    Route::post('/pelangganku/delete/{id}',[PelangganController::class,'delete'])->name('pelangganku.delete');

    route::post('/logout', [AuthController::class,'logout'])->name('logout');
});







