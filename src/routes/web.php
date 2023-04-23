<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/post' , [PostController::class , 'index'])->name('post.index');
Route::get('/post/{post}' , [PostController::class , 'show'])->name('post.show');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
