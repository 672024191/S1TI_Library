<?php

use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('book-types', BookTypeController::class);
Route::resource('books', BookController::class);