<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFahrzeugesKontaktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fahrzeuges_kontakt', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('verkauf_id')->unsigned();
            $table->bigInteger('user_id')->nullable();;
            $table->foreign('verkauf_id')->references('id')->on('fahrzeuges_verkauf')->onDelete('cascade');
            $table->tinyInteger('kontakt')->default(0);
            $table->string('anrede');
            $table->string('firma')->nullable();
            $table->string('vorname');
            $table->string('nachname');
            $table->string('strasse');
            $table->string('plz', 5);
            $table->string('ort');
            $table->string('telefon');
            $table->string('email');
            $table->integer('aktiv')->default(1);
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
        Schema::dropIfExists('fahrzeuges_kontakts');
    }
}
