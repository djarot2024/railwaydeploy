<?php

use App\Http\Controllers\Api\LaundryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cucianku',[LaundryController::class,'index'])->name('cucianku.index');
Route::get('/cucianku/{nota?}',[LaundryController::class,'show'])->name('cucianku.show');