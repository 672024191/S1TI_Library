<?php

use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('book-types', BookTypeController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::resource('transactions', TransactionController::class);