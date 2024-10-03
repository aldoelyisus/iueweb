<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToFilesTable extends Migration
{
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('path')->after('name');
            $table->string('google_drive_id')->nullable()->after('path');
        });
    }

    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropColumn(['name', 'path', 'google_drive_id']);
        });
    }
}