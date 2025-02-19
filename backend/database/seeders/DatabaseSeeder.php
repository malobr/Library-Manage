<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Chamar os seeders de User, Book e Rental
        $this->call([
            UserSeeder::class,
            BookSeeder::class,
            RentalSeeder::class,
        ]);
    }
}
