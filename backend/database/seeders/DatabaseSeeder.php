<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
public function run(): void
{
    $this->call([
        RolePermissionSeeder::class,
        UserSeeder::class,
        BookSeeder::class,
        RentalSeeder::class,
    ]);
}

}
