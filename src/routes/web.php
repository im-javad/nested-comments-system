<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/post' , [PostController::class , 'index'])->name('post.index');
Route::get('/post/{post}' , [PostController::class , 'show'])->name('post.show');

Route::post('/post/{post}/comment' , [CommentController::class , 'store'])->name('post.comment.store');
Route::post('/post/{post}/{comment}/reply' , [CommentController::class , 'newReply'])->name('post.comment.reply.store');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
