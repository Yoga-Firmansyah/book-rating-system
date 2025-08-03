<?php

use App\Http\Controllers\BookRatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookRatingController::class, 'index'])->name('home');
