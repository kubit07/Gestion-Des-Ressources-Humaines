<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConjointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjoints', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('agent_id');
            $table->timestamps();
            $table->string('nomConj');
            $table->string('prenomConj');
            $table->string('sexeConj');
            $table->date('dateNaisConj');
            $table->string('lieuNaisCon');
            $table->string('nationConj');
            $table->string('villageVilleConj');
            $table->string('prefectConj');
            $table->string('ethnieConj');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conjoints');
    }
}
