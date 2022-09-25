<?php

use Illuminate\Support\Str;

it('Prueba de registro', function () {
    $response = $this->actingAs(\App\Models\User::factory()->create([
        'name' => fake()->name(),
        'email' => fake()->safeEmail(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'TipoDocumento' => 'CC',
        'NumeroDocumento' => Str::random(10),
        'NumeroContacto' => '3008108926',
        'Genero' => 'Masculino',
        'Direccion' => 'calle 15b # 9 - 35',
        'Barrio' => 'La ceniza',
        'Ciudad' => 'Manizales',
        'Perfil' => 'Administrador',
        'Activo' => TRUE
    ]))->get('/usuarios');

    $response ->assertStatus(200);
});
