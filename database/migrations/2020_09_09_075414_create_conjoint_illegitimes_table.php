<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConjointIllegitimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjoint_illegitimes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('agent_id');
            $table->string('nomConj');
            $table->string('prenomConj');
            $table->string('sexeConj');
            $table->date('dateNaisConj');
            $table->string('lieuNaisCon');
            $table->string('nationConj');
            $table->string('villageVilleConj');
            $table->string('prefectConj');
            $table->string('ethnieConj');
            $table->string('MotifRelation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conjoint_illegitimes');
    }
}
