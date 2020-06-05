<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFahrzeugesAusstattungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fahrzeuges_ausstattung', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('verkauf_id')->unsigned();
            $table->bigInteger('user_id')->nullable();
            $table->foreign('verkauf_id')->references('id')->on('fahrzeuges_verkauf')->onDelete('cascade');
            $table->string('aussenfarbe')->nullable();
            $table->string('innenfarbe')->nullable();
            $table->string('innenmaterial')->nullable();
            $table->tinyInteger('metallic')->default(0)->nullable();
            $table->tinyInteger('antiblockiersystem')->default(0)->nullable();
            $table->tinyInteger('esp')->default(0)->nullable();
            $table->tinyInteger('asr')->default(0)->nullable();
            $table->tinyInteger('berganfahrassistent')->default(0)->nullable();
            $table->tinyInteger('muedigkeitswarner')->default(0)->nullable();
            $table->tinyInteger('spurhalteassistent')->default(0)->nullable();
            $table->tinyInteger('totwinkelassistent')->default(0)->nullable();
            $table->tinyInteger('innenspiegel')->default(0)->nullable();
            $table->tinyInteger('nachtsicht')->default(0)->nullable();
            $table->tinyInteger('notbremsassistent')->default(0)->nullable();
            $table->tinyInteger('notrufsystem')->default(0)->nullable();
            $table->tinyInteger('verkehrszeichenerkennung')->default(0)->nullable();
            $table->string('tempomat')->default(0)->nullable();
            $table->tinyInteger('geschwindigkeitsbegrenzer')->default(0)->nullable();
            $table->tinyInteger('abstandswarner')->default(0)->nullable();
            $table->string('airbag')->default(0)->nullable();
            $table->tinyInteger('isofix')->default(0)->nullable();
            $table->tinyInteger('isofixbeifahrer')->default(0)->nullable();
            $table->string('scheinwerfer')->default(0)->nullable();
            $table->tinyInteger('Scheinwerferreinigung')->default(0)->nullable();
            $table->string('fernlicht')->default(0)->nullable();
            $table->tinyInteger('fernlichtassistent')->default(0)->nullable();
            $table->string('tagfahrlicht')->default(0)->nullable();
            $table->string('kurvenlicht')->default(0)->nullable();
            $table->tinyInteger('nebelscheinwerfer')->default(0)->nullable();
            $table->tinyInteger('alarmanlage')->default(0)->nullable();
            $table->tinyInteger('wegfahrsperre')->default(0)->nullable();
            $table->string('klimatisierung')->default(0)->nullable();
            $table->tinyInteger('standheizung')->default(0)->nullable();
            $table->tinyInteger('beheizbarefrontscheibe')->default(0)->nullable();
            $table->tinyInteger('beheizbareslenkrad')->default(0)->nullable();
            $table->tinyInteger('selbstlenkend')->default(0)->nullable();
            $table->tinyInteger('vorneep')->default(0)->nullable();
            $table->tinyInteger('hintenep')->default(0)->nullable();
            $table->tinyInteger('kamera')->default(0)->nullable();
            $table->tinyInteger('kamera_360')->default(0)->nullable();
            $table->tinyInteger('vornesv')->default(0)->nullable();
            $table->tinyInteger('hintensh')->default(0)->nullable();
            $table->tinyInteger('vorneesv')->default(0)->nullable();
            $table->tinyInteger('hintenesh')->default(0)->nullable();
            $table->tinyInteger('sportsitze')->default(0)->nullable();
            $table->tinyInteger('armlehne')->default(0)->nullable();
            $table->tinyInteger('lordosenstuetze')->default(0)->nullable();
            $table->tinyInteger('massagesitze')->default(0)->nullable();
            $table->tinyInteger('sitzbelueftung')->default(0)->nullable();
            $table->tinyInteger('umklappbarerbeifahrersitz')->default(0)->nullable();
            $table->tinyInteger('efensterheber')->default(0)->nullable();
            $table->tinyInteger('eseitenspiegel')->default(0)->nullable();
            $table->tinyInteger('eheckklappe')->default(0)->nullable();
            $table->tinyInteger('zv')->default(0)->nullable();
            $table->tinyInteger('szv')->default(0)->nullable();
            $table->tinyInteger('lichtsensor')->default(0)->nullable();
            $table->tinyInteger('regensensor')->default(0)->nullable();
            $table->tinyInteger('servo')->default(0)->nullable();
            $table->tinyInteger('ambilight')->default(0)->nullable();
            $table->tinyInteger('lederlenkrad')->default(0)->nullable();
            $table->tinyInteger('tunerradio')->default(0)->nullable();
            $table->tinyInteger('dab')->default(0)->nullable();
            $table->tinyInteger('cd')->default(0)->nullable();
            $table->tinyInteger('tv')->default(0)->nullable();
            $table->tinyInteger('navigationssystem')->default(0)->nullable();
            $table->tinyInteger('soundsystem')->default(0)->nullable();
            $table->tinyInteger('touchscreen')->default(0)->nullable();
            $table->tinyInteger('sprachsteuerung')->default(0)->nullable();
            $table->tinyInteger('multifunktionslenkrad')->default(0)->nullable();
            $table->tinyInteger('freisprecheinrichtung')->default(0)->nullable();
            $table->tinyInteger('usb')->default(0)->nullable();
            $table->tinyInteger('bluetooth')->default(0)->nullable();
            $table->tinyInteger('androidauto')->default(0)->nullable();
            $table->tinyInteger('carplay')->default(0)->nullable();
            $table->tinyInteger('wlanwifi')->default(0)->nullable();
            $table->tinyInteger('streaming')->default(0)->nullable();
            $table->tinyInteger('induktionsladen')->default(0)->nullable();
            $table->tinyInteger('bordcomputer')->default(0)->nullable();
            $table->tinyInteger('headup')->default(0)->nullable();
            $table->tinyInteger('kombiinstrument')->default(0)->nullable();
            $table->tinyInteger('leichtmetallfelgen')->default(0)->nullable();
            $table->tinyInteger('sommerreifen')->default(0)->nullable();
            $table->tinyInteger('winterreifen')->default(0)->nullable();
            $table->tinyInteger('allwetterreifen')->default(0)->nullable();
            $table->string('pannenhilfe')->default(0)->nullable();
            $table->tinyInteger('reifendruckkontrolle')->default(0)->nullable();
            $table->tinyInteger('winterpaket')->default(0)->nullable();
            $table->tinyInteger('raucherpaket')->default(0)->nullable();
            $table->tinyInteger('sportpaket')->default(0)->nullable();
            $table->tinyInteger('sportfahrwerk')->default(0)->nullable();
            $table->tinyInteger('luftfederung')->default(0)->nullable();
            $table->string('anhaengerkupplung')->default(0)->nullable();
            $table->tinyInteger('gepaeckraumabtrennung')->default(0)->nullable();
            $table->tinyInteger('skisack')->default(0)->nullable();
            $table->tinyInteger('schiebedach')->default(0)->nullable();
            $table->tinyInteger('panoramadach')->default(0)->nullable();
            $table->tinyInteger('dachreling')->default(0)->nullable();
            $table->tinyInteger('behindertengerecht')->default(0)->nullable();
            $table->tinyInteger('taxi')->default(0)->nullable();
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
        Schema::dropIfExists('fahrzeuges_ausstattung');
    }
}
