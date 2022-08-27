<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTauxAchevementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('taux_achevements', function (Blueprint $table) {
            $table->id();
            $table->double('taux_achevement');
            $table->foreignId('objectif_id')->constrained('objectif');
            $table->foreignId('indicateurU_id')->constrained('indicateur_u_s');
            $table->foreignId('assignation_objectif_id')->constrained('assignation_objectif');
            
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
        Schema::dropIfExists('taux_achevements');
    }
}
