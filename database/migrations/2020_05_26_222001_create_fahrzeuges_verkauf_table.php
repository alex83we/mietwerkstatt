<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFahrzeugesVerkaufTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fahrzeuges_verkauf', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('slug');
            $table->string('marke');
            $table->string('modell');
            $table->string('ez', 8);
            $table->decimal('km', 10, 3);
            $table->string('kraftstoff');
            $table->string('kategorie');
            $table->string('tueren')->default('4/5');
            $table->string('scheibetueren')->default(0);
            $table->string('sitzplaetze')->default(5);
            $table->integer('kw');
            $table->integer('ps');
            $table->integer('ccm');
            $table->string('getriebe');
            $table->string('allrad')->default(0)->nullable();
            $table->string('schaltwippen')->default(0)->nullable();
            $table->string('schadstoffklasse');
            $table->string('umweltplakette', 15);
            $table->integer('kraftstoff_komb')->nullable();
            $table->integer('kraftstoff_innerorts')->nullable();
            $table->integer('kraftstoff_ausserorts')->nullable();
            $table->integer('co2')->nullable();
            $table->string('partikelfilter')->default(0)->nullable();
            $table->string('ssa')->default(0)->nullable();
            $table->integer('halter')->nullable();
            $table->string('fahrzeugart')->nullable();
            $table->string('besfahrzeug')->nullable();
            $table->string('unfallfahrzeug')->nullable();
            $table->string('fahrtauglich')->nullable();
            $table->string('nichtraucher')->nullable();
            $table->string('hu')->nullable();
            $table->string('scheckheft')->default(0)->nullable();
            $table->string('garantie')->default(0)->nullable();
            $table->longText('beschreibung');
            $table->decimal('preis', 9, 2);
            $table->string('preisx');
            $table->string('images')->default('default.png');
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
        Schema::dropIfExists('fahrzeuges_verkauf');
    }
}
