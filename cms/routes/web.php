<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Auth
Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store']);
    
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [SessionController::class, 'destroy']);
});

// group route 
Route::controller(PostController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/posts/post/{post}', 'show')->name('posts.show');
});

// Route::resource('posts', PostController::class);

Route::get('/post', [PostController::class, 'create'])
    ->name('post.create')
    ->middleware('auth');

Route::post('/post', [PostController::class, 'store'])
    ->name('post.store')
    ->middleware('auth');




Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
