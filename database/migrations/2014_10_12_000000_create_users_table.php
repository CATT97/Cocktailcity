<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->String('TipoDocumento');
            $table->String('NumeroDocumento');
            $table->String('NumeroContacto');
            $table->String('Genero');
            $table->String('Direccion');
            $table->String('Barrio');
            $table->String('Ciudad');
            $table->String('Perfil')->default('Cliente');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();

        $user->name = 'ADMIN';
        $user->email = 'admin@cocktailcity.com';
        $user->password = Hash::make('Admin123456');
        $user->TipoDocumento = 'CC';
        $user->NumeroDocumento = '1035234370';
        $user->NumeroContacto = '3008108926';
        $user->Genero = 'Masculino';
        $user->Direccion = 'calle 15b # 9 - 35';
        $user->Barrio = 'La ceniza';
        $user->Ciudad = 'Manizales';
        $user->Perfil = 'Administrador';

        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
