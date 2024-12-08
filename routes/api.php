<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get-books', [ApiController::class,'getBook']);
Route::get('/get-book/{id}', [ApiController::class,'getBookDetail']);
Route::post('/create-book', [ApiController::class,'createBook'])->middleware(['auth:sanctum']);
Route::post('/delete-book/{id}', [ApiController::class,'deleteBook'])->middleware(['auth:sanctum']);
Route::patch('/update-book/{id}', [ApiController::class,'updateBook'])->middleware(['auth:sanctum']);



Route::post('/registration', [ApiController::class,'register']);
Route::post('/login', [ApiController::class,'login']);
Route::post('/logout', [ApiController::class,'logout'])->middleware(['auth:sanctum']);
