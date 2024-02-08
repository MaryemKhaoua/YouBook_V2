<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

Route::get('/', BookController::class .'@index')->name('books.index');
Route::get('/books/create', BookController::class . '@create')->name('books.create');
Route::post('/books', BookController::class .'@store')->name('books.store');
Route::get('/books/{id}', BookController::class .'@show')->name('books.show');
Route::get('/books/{id}/edit', BookController::class .'@edit')->name('books.edit');
Route::put('/books/{id}', BookController::class .'@update')->name('books.update');
Route::delete('/books/{id}', BookController::class .'@destroy')->name('books.destroy');
Route::post('/books/{id}/reserve', BookController::class .'@reserve')->name('books.reserve');
Route::post('/register', AuthController::class .'@store')->name('user.register');
Route::get('/register', [AuthController::class, 'create']);