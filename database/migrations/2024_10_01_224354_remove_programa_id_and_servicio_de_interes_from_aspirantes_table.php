<?php
// database/migrations/xxxx_xx_xx_xxxxxx_remove_programa_id_and_servicio_de_interes_from_aspirantes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveProgramaIdAndServicioDeInteresFromAspirantesTable extends Migration
{
    public function up()
    {
        Schema::table('aspirantes', function (Blueprint $table) {
            $table->dropForeign(['programa_id']);
            $table->dropColumn('programa_id');
            $table->dropColumn('servicio_de_interes');
        });
    }

    public function down()
    {
        Schema::table('aspirantes', function (Blueprint $table) {
            $table->foreignId('programa_id')->nullable()->constrained('programas')->onDelete('cascade');
            $table->string('servicio_de_interes');
        });
    }
}