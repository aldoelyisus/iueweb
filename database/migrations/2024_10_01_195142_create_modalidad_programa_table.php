<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalidadProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidad_programa', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id'
            $table->foreignId('modalidad_id') // Crea la columna 'modalidad_id'
                  ->constrained('modalidades') // Referencia la tabla 'modalidades'
                  ->onDelete('cascade'); // Elimina registros relacionados en cascada
            $table->foreignId('programa_id') // Crea la columna 'programa_id'
                  ->constrained('programas') // Referencia la tabla 'programas'
                  ->onDelete('cascade'); // Elimina registros relacionados en cascada
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidad_programa'); // Elimina la tabla al revertir la migración
    }
}
