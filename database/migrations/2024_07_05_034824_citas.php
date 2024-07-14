<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Return the migrations.
     * 
     * @return void
     */
    public function up(): void
    {
        if(!Schema::hasTable('citas')){
            Schema::create('citas', function (Blueprint $table) {
                $table->id();
                $table->string('pacientes');
                $table->time('hora');
                $table->date('fecha');
                $table->string('servicio');
                $table->foreignId('medico_id')->nullable()->constrained('users')->onDelete('set null'); // Nuevo campo para almacenar el ID del médico
                $table->string('Descripcion');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
