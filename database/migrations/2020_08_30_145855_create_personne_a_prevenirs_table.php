<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonneAPrevenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne_a_prevenirs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomPAP');
            $table->integer('numPAP');
            $table->unsignedInteger('agent_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personne_a_prevenirs');
    }
}
