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
   

    // Rotas para AuthController
    Route::post('logout', [AuthController::class, 'logout']);  // Logout de usuário
    Route::get('users', [AuthController::class, 'index']);  // Listar todos os usuários
    Route::get('users/{id}', [AuthController::class, 'show']);  // Mostrar um usuário específico
    Route::put('users/{id}', [AuthController::class, 'update']);  // Atualizar um usuário específico
    Route::delete('users/{id}', [AuthController::class, 'destroy']);  // Deletar um usuário específico



    // Rotas para Books
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{name}', [BookController::class, 'show']);
    Route::post('books', [BookController::class, 'store']);
    Route::put('books/{id}', [BookController::class, 'update']);
    Route::delete('books/{id}', [BookController::class, 'destroy']);
    Route::post('/rentals/{id}/return', [RentalController::class, 'returnBook']); // Devolver um livro


    // Rotas para Rentals
    Route::get('rentals', [RentalController::class, 'index']);
    Route::get('rentals/{searchTerm}', [RentalController::class, 'show']);
    Route::post('rentals', [RentalController::class, 'store']);
    Route::put('rentals/{id}', [RentalController::class, 'update']);
    Route::delete('rentals/{id}', [RentalController::class, 'destroy']);
});
