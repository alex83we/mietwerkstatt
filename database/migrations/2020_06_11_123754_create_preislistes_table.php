<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreislistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preislistes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('kategorie');
            $table->string('zusatztitle')->nullable();
            $table->decimal('preis', '10', '2');
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
        Schema::dropIfExists('preislistes');
    }
}
