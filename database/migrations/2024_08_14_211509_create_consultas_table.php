<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('consultas')) {
            Schema::create('consultas', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('paciente_id');
                $table->unsignedBigInteger('medico_id');
                $table->text('motivo_consulta');
                $table->text('notas_padecimiento')->nullable();
                $table->integer('edad')->nullable();
                $table->float('talla')->nullable();
                $table->float('temperatura')->nullable();
                $table->float('peso')->nullable();
                $table->integer('frecuencia_cardiaca')->nullable();
                $table->text('alergias')->nullable();
                $table->text('diagnostico')->nullable();
                $table->string('solicitar_estudios')->nullable();
                $table->string('indicaciones_estudios')->nullable();
                $table->string('medicacion')->nullable();
                $table->string('cantidad')->nullable();
                $table->string('frecuencia')->nullable();
                $table->string('duracion')->nullable();
                $table->text('notas_receta')->nullable();
                $table->float('total');
                $table->timestamps();

                $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
                $table->foreign('medico_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
