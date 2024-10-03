<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_servicio_y_programa_to_aspirantes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServicioYProgramaToAspirantesTable extends Migration
{
    public function up()
    {
        Schema::table('aspirantes', function (Blueprint $table) {
            $table->string('nombre_servicio')->nullable();
            $table->string('nombre_programa')->nullable();
        });
    }

    public function down()
    {
        Schema::table('aspirantes', function (Blueprint $table) {
            $table->dropColumn('nombre_servicio');
            $table->dropColumn('nombre_programa');
        });
    }
}