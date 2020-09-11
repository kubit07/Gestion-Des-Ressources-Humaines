<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('etat_id');
            $table->unsignedInteger('type_agent_id');
            $table->string('nomAgent');
            $table->string('prenomAgent');
            $table->string('sexeAgent');
            $table->date('dateNaisAgent');
            $table->string('lieuNaisAgent');
            $table->string('sitMatAgent');
            $table->string('nationAgent');
            $table->string('ethnieAgent');
            $table->string('villageOrigineAgent');
            $table->string('prefectureAgent');
            $table->string('religionAgent');
            $table->string('groupeSangAgent');
            $table->string('rhesusAgent');
            $table->integer('numDecision');
            $table->date('dateDecision');
            $table->integer('numCNSS');
            $table->integer('numAllocation');
            $table->string('langue');
            $table->string('loisir');
            $table->date('dateRetraite');
            $table->date('dateBapteme');
            $table->string('pasteurBapteme');
            $table->date('dateConfirmation');
            $table->string('lieuConfirmation');
            $table->string('pasteurConfirm');
            $table->string('nomParain');
            $table->string('nomMarraine');
            $table->string('photoAgent')->nullable();
            $table->string('quartier');
            $table->integer('rue');
            $table->string('ville');
            $table->integer('tel');
            $table->string('email');
            $table->date('dateEtat')->nullable();
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
