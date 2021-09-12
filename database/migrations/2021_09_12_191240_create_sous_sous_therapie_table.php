<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousSousTherapieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_sous_therapie', function (Blueprint $table) {
            $table->id();
            $table->integer("sous_therapie_id");
            $table->string("nom");
            $table->string("description");
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
        Schema::dropIfExists('sous_sous_therapie');
    }
}
