<?php

use App\Http\Controllers\BookTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route CRUD untuk BookType
Route::resource('book-types', BookTypeController::class);