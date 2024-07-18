<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->foreignId('medico_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });

        // Modificar la tabla para agregar la columna content como MEDIUMBLOB
        Schema::table('servicios', function (Blueprint $table) {
            DB::statement('ALTER TABLE servicios ADD content LONGBLOB NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
