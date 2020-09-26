<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfantisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfantis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomEnfant');
            $table->string('prenomEnfant');
            $table->string('sexeEnfant');
            $table->date('dateNaisEnfant');
            $table->string('lieuNaisEnfant');
            $table->string('sitMatEnfant');
            $table->string('telEnfant');
            $table->string('professionEnfant');
            $table->unsignedInteger('conjointi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfantis');
    }
}
