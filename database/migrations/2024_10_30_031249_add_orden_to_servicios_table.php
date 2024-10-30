<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->integer('orden')->default(0); // Añadir la columna orden
        });
    }
    
    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropColumn('orden');
        });
    }
};
