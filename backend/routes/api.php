<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    // Rotas para Books
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{id}', [BookController::class, 'show']);
    Route::post('books', [BookController::class, 'store']);
    Route::put('books/{id}', [BookController::class, 'update']);
    Route::delete('books/{id}', [BookController::class, 'destroy']);
    Route::post('/rentals/{id}/return', [RentalController::class, 'returnBook']); // Devolver um livro


    // Rotas para Rentals
    Route::get('rentals', [RentalController::class, 'index']);
    Route::get('rentals/{id}', [RentalController::class, 'show']);
    Route::post('rentals', [RentalController::class, 'store']);
    Route::put('rentals/{id}', [RentalController::class, 'update']);
    Route::delete('rentals/{id}', [RentalController::class, 'destroy']);
});
