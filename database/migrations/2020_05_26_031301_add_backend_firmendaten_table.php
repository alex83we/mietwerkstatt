<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackendFirmendatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backend_firmendaten', function (Blueprint $table) {
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('montag');
            $table->string('dienstag');
            $table->string('mittwoch');
            $table->string('donnerstag');
            $table->string('freitag');
            $table->string('samstag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backend_firmendaten', function (Blueprint $table) {
            //
        });
    }
}
