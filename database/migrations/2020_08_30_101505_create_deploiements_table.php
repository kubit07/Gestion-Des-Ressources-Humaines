<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeploiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deploiements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('nunDetachement');
            $table->date('dateDeploiement');
            $table->date('dateRepriseService');
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('fonction_id');
            $table->unsignedInteger('structure_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deploiements');
    }
}
