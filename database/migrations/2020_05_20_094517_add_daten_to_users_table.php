<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatenToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('email');
            $table->string('firma')->nullable()->after('username');
            $table->string('anrede')->nullable()->after('firma');
            $table->string('vorname')->nullable()->after('anrede');
            $table->string('straße')->nullable()->after('name');
            $table->string('plz', 5)->nullable()->after('straße');
            $table->string('ort')->nullable()->after('plz');
            $table->string('telefon', 15)->nullable()->after('ort');
            $table->boolean('terms')->default(0)->after('telefon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
