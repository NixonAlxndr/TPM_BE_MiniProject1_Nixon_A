<?php

use App\Http\Controllers\CultureController;
use App\Http\Controllers\MythtaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[MythtaleController::class,'index'])->name('Home');
Route::get('/tales', [MythtaleController::class,'getTales'])->name('getTales');
Route::post('/tales/create', [MythtaleController::class,'createTales'])->name('createTales');
Route::get('/tales/create', [MythtaleController::class,'createTalesPage'])->name('tales.createTales');

Route::get('/culture/create', [CultureController::class, 'index'])->name('culture.createCulture');
Route::post('/culture/create', [CultureController::class, 'createCulture'])->name('createCulture');