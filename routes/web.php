<?php

use App\Models;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/article/{article}', [ArticleController::class, 'show']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);


Route::post('/articles/store', [ArticleController::class, 'store']);
Route::get('/dashboard', [ArticleController::class, 'manage'])->middleware('auth');
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware('auth');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware('auth');
Route::post('/articles/{article}/update', [ArticleController::class, 'update'])->middleware('auth');
Route::delete('/articles/{article}', [ArticleController::class, 'delete'])->middleware('auth');

Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
