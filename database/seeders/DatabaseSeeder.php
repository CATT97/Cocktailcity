<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'ADMIN',
            'email' => 'admin@cocktailcity.com',
            'password' => Hash::make('Admin123456'),
            'TipoDocumento' => 'CC',
            'NumeroDocumento' => '1035234370',
            'NumeroContacto' => '3008108926',
            'Genero' => 'Masculino',
            'Direccion' => 'calle 15b # 9 - 35',
            'Barrio' => 'La ceniza',
            'Ciudad' => 'Manizales',
            'Perfil' => 'Administrador'
        ]);
    }
}
