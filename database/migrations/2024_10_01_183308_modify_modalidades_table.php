<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyModalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modalidades', function (Blueprint $table) {
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->string('titulo_perfil_ingreso')->nullable();
            $table->text('desc_perfil_ingreso')->nullable();
            $table->string('link_img_perfil_ingreso')->nullable();
            $table->string('titulo_perfil_egreso')->nullable();
            $table->text('desc_perfil_egreso')->nullable();
            $table->string('link_img_perfil_egreso')->nullable();
            $table->string('titulo_mapa_curricular')->nullable();
            $table->text('desc_mapa_curricular')->nullable();
            $table->string('link_img_mapa_curricular')->nullable();
            $table->string('link_video_clase_muestra')->nullable();
            $table->string('link_img_extra')->nullable();
            $table->text('desc_extra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modalidades', function (Blueprint $table) {
            $table->dropColumn([
                'titulo',
                'subtitulo',
                'titulo_perfil_ingreso',
                'desc_perfil_ingreso',
                'link_img_perfil_ingreso',
                'titulo_perfil_egreso',
                'desc_perfil_egreso',
                'link_img_perfil_egreso',
                'titulo_mapa_curricular',
                'desc_mapa_curricular',
                'link_img_mapa_curricular',
                'link_video_clase_muestra',
                'link_img_extra',
                'desc_extra',
            ]);
        });
    }
}
