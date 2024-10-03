<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToServiciosTable extends Migration
{
    public function up()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->softDeletes(); // Agrega la columna deleted_at
        });
    }

    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Elimina la columna deleted_at si se hace un rollback
        });
    }
}
