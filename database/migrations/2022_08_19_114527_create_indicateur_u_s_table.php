<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateurUSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicateur_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('intitule_score');
            $table->integer('valeur_score');
            $table->foreignId('objectif_id')->constrained('objectif')->nullable();
            $table->foreignId('user_id')->constrained()->nullable();
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
        Schema::dropIfExists('indicateur_u_s');
    }
}
