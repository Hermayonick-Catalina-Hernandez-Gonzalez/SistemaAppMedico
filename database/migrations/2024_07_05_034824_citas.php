<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('pacientes');
            $table->time('hora');
            $table->date('fecha');
            $table->string('servicio');
            $table->string('Descripcion');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
