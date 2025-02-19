<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Criar usuários
        User::create([
            'name' => 'João Silva',
            'email' => 'joao@example.com',
            'cpf' => '12345678901',
            'phone' => '11987654321', // Adicionar um telefone
            'status' => 'normal',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Maria Souza',
            'email' => 'maria@example.com',
            'cpf' => '98765432100',
            'phone' => '11987654322', // Adicionar um telefone
            'status' => 'normal',
            'password' => Hash::make('password123'),
        ]);
    }
}
