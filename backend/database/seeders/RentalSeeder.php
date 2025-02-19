<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Rental;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    public function run()
    {
        // Criar aluguéis
        $user1 = User::where('email', 'joao@example.com')->first();
        $user2 = User::where('email', 'maria@example.com')->first();

        $book1 = Book::where('name', 'O Senhor dos Anéis')->first();
        $book2 = Book::where('name', '1984')->first();

        Rental::create([
            'user_id' => $user1->id,
            'book_id' => $book1->id,
            'start_date' => '2025-02-01',
            'end_date' => '2025-02-15',
        ]);

        Rental::create([
            'user_id' => $user2->id,
            'book_id' => $book2->id,
            'start_date' => '2025-02-05',
            'end_date' => '2025-02-20',
        ]);
    }
}
