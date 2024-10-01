<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_aspirante_programa_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspiranteProgramaTable extends Migration
{
    public function up()
    {
        Schema::create('aspirante_programa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aspirante_id')->constrained()->onDelete('cascade');
            $table->foreignId('programa_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aspirante_programa');
    }
}
