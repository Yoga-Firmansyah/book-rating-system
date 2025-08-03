<?php

use App\Http\Controllers\BookRatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookRatingController::class, 'index'])->name('home');
Route::get('/top-authors', [BookRatingController::class, 'topAuthors'])->name('top-authors');
Route::get('/rating', [BookRatingController::class, 'createRating'])->name('rating');
Route::get('/getBooks/{author}', [BookRatingController::class, 'getBooks'])->name('getBooks');
Route::post('/store-rating', [BookRatingController::class, 'storeRating'])->name('store-rating');
