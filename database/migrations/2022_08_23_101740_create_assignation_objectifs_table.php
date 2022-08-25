<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignationObjectifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignation_objectif', function (Blueprint $table) {
            $table->id();
            $table->date('date_deb');
            $table->date('date_fin');
            $table->integer('valeur_eval');
            $table->foreignId('objectif_id')->constrained('objectif');
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
        Schema::dropIfExists('assignation_objectifs');
    }
}
