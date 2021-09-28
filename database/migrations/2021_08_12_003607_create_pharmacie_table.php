<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacie', function (Blueprint $table) {
            $table->id();
            $table->string('pharmacie_nom')->nullable();
            $table->string('pharmacie_adresse')->nullable();
            $table->string('pharmacie_numero')->nullable();
            $table->double('longitude')->nullable();
            $table->double('lattitude')->nullable();
            $table->string('region')->nullable();
            $table->string('commune')->nullable();
            $table->string('department')->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('pharmacie');
    }
}
