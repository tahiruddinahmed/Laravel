<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'login']);

// group route 
Route::controller(PostController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/posts/post/{post}', 'show')->name('posts.show');
});

// Route::resource('posts', PostController::class);





Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
