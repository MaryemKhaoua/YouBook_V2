<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;

Route::get('/', [BookController::class, 'index'])->name('books.index');  
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::post('/register', [AuthController::class, 'store'])->name('user.register');
Route::get('/register', [AuthController::class, 'create']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/book/reservation', [BookController::class , 'getReservation'])->name('books.reservation');



Route::middleware(['auth'])->group(function () {

Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::post('/reserver/{id}', [BookController::class, 'reserve'])->name('books.reserve');

});


Route::middleware(['admin'])->group(function () {

    Route::get('/book/create', [BookController::class , 'addBook'])->name('books.add');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

});





