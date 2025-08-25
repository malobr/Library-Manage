<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Criar ou buscar João
        $joao = User::firstOrCreate(
            ['email' => 'joao@example.com'],
            [
                'name' => 'João Silva',
                'cpf' => '12345678901',
                'phone' => '11987654321',
                'status' => 'normal',
                'password' => Hash::make('password123'),
            ]
        );
        $joao->assignRole('admin'); // João é admin

        // Criar ou buscar Maria
        $maria = User::firstOrCreate(
            ['email' => 'maria@example.com'],
            [
                'name' => 'Maria Souza',
                'cpf' => '98765432100',
                'phone' => '11987654322',
                'status' => 'normal',
                'password' => Hash::make('password123'),
            ]
        );
        $maria->assignRole('user'); // Maria é user
    }
}
