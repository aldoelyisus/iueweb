<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_aspirante_servicio_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspiranteServicioTable extends Migration
{
    public function up()
    {
        Schema::create('aspirante_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aspirante_id')->constrained()->onDelete('cascade');
            $table->foreignId('servicio_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aspirante_servicio');
    }
}