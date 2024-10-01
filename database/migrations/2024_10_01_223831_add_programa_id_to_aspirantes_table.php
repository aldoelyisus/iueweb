<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_programa_id_to_aspirantes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProgramaIdToAspirantesTable extends Migration
{
    public function up()
    {
        Schema::table('aspirantes', function (Blueprint $table) {
            $table->foreignId('programa_id')->nullable()->constrained('programas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('aspirantes', function (Blueprint $table) {
            $table->dropForeign(['programa_id']);
            $table->dropColumn('programa_id');
        });
    }
}