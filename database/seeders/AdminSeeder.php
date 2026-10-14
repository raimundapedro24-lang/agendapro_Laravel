<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder{
    public function run(): void{
        User::updateOrCreate(
            ['email' => 'admin@admin.com'], // Busca por este e-mail
            [
                'name' => 'Administrador do Sistema',
                'password' => Hash::make('admin123'), // Senha padrão
                'role' => 'admin',    // Definido na nossa migration
                'active' => true,      // Já nasce ativo para poder logar
            ]
        );
    }
}

