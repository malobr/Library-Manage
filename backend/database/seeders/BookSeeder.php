<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Criar livros
        Book::create([
            'name' => 'O Senhor dos Anéis',
            'type' => 'Fantasia',
            'author' => 'J.R.R. Tolkien',
            'pages' => 1200,
            'price' => 79.90,
            'synopsis' => 'Uma épica história de fantasia onde um grupo de heróis tenta destruir um poderoso anel.',
            'available' => true,
        ]);

        Book::create([
            'name' => '1984',
            'type' => 'Distopia',
            'author' => 'George Orwell',
            'pages' => 328,
            'price' => 39.90,
            'synopsis' => 'Uma crítica à vigilância governamental e à perda de liberdade no futuro.',
            'available' => true,
        ]);

        Book::create([
            'name' => 'Harry Potter e a Pedra Filosofal',
            'type' => 'Fantasia',
            'author' => 'J.K. Rowling',
            'pages' => 223,
            'price' => 49.90,
            'synopsis' => 'A história do jovem Harry Potter que descobre ser um bruxo e entra na escola de magia.',
            'available' => true,
        ]);
    }
}
