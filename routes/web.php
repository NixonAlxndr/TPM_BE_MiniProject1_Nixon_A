<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name("Home"); 
Route::get('/book-collection', [HomeController::class,'showBook'])->name('ShowBook')->middleware(App\Http\Middleware\AuthCheck::class);

Route::get('/book-collection/{book}/edit', [PostController::class,'edit'])->name('Edit.Book');
Route::put('/book-collection/{book}/update', [PostController::class,'update'])->name('Update.Book');

Route::delete('/book-collection/{book}/delete', [PostController::class,'delete'])->name('Delete.Book');

Route::get("/add-book", [PostController::class, 'index'])->name('Post.Book');
Route::post("/add-book", [PostController::class, 'createBook'])->name('Create.Book');

Route::get('/add-category', [CategoryController::class,'index'])->name('Post.Category');
Route::post('/add-category', [CategoryController::class,'createCategory'])->name('Create.Category');

Route::get('/regsiter', [RegisterController::class, 'index'])->name('Register');
Route::post('/register', [RegisterController::class, 'registration'])->name('Registration');

Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::post('/login', [LoginController::class, 'login'])->name('Authentication');

Route::get('/logout', [RegisterController::class,'logout'])->name('Logout');

Route::get('/send-message', [MailController::class,'index'])->name('SendMail');