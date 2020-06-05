<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFahrzeugesImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fahrzeuges_image', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('verkauf_id')->unsigned();
            $table->bigInteger('user_id')->nullable();
            $table->string('images')->nullable();
            $table->foreign('verkauf_id')->references('id')->on('fahrzeuges_verkauf')->onDelete('cascade');
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
        Schema::dropIfExists('fahrzeuges_images');
    }
}
