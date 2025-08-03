<?php

use App\Http\Controllers\BookRatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookRatingController::class, 'index'])->name('home');
Route::get('/top-authors', [BookRatingController::class, 'topAuthors'])->name('top-authors');
