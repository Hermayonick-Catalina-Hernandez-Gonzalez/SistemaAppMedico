<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Importa Hash para encriptar la contraseña

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('profesion')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Insertar registros predefinidos en la tabla 'users'
        DB::table('users')->insert([
            [
                'nombre' => 'Hermayonick',
                'apellido' => 'Hernandez',
                'fecha_nacimiento' => '2003-10-23',
                'telefono' => '8341165455',
                'email' => 'her@me.com',
                'password' => Hash::make('hermayonick23'), // Encriptar la contraseña
                'role' => 'Administrador',
                'profesion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Jesus',
                'apellido' => 'Olazaran',
                'fecha_nacimiento' => '2002-12-25',
                'telefono' => '2002-12-25',
                'email' => 'jesus@me.com',
                'password' => Hash::make('jesus123'), // Encriptar la contraseña
                'role' => 'Médico',
                'profesion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Alan',
                'apellido' => 'Torres',
                'fecha_nacimiento' => '2003-10-24',
                'telefono' => '8345671234',
                'email' => 'alan@me.com',
                'password' => Hash::make('alan1234'), // Encriptar la contraseña
                'role' => 'Secretario',
                'profesion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
