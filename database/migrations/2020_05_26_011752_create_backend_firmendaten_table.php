<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackendFirmendatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backend_firmendaten', function (Blueprint $table) {
            $table->id();
            $table->string('firmenname');
            $table->string('firmenzusatz');
            $table->string('straße');
            $table->string('plz', 5);
            $table->string('ort');
            $table->string('telefon');
            $table->string('www');
            $table->string('mobil');
            $table->string('email');
            $table->string('fax');
            $table->string('ustid', 11)->nullable();
            $table->string('steuernr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backend_firmendaten');
    }
}
