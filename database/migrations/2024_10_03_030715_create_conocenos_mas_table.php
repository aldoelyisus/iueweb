<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConocenosMasTable extends Migration
{
    public function up()
    {
        Schema::create('conocenos_mas', function (Blueprint $table) {
            $table->id();
            $table->text('mision');
            $table->text('vision');
            $table->text('valores');
            $table->text('objetivo');
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img4')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conocenos_mas');
    }
}