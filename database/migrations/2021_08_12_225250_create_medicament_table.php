<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicament', function (Blueprint $table) {
            $table->id();
            $table->integer("sous_sous_therapie_id")->nullable();
            $table->string('medicament_nom')->nullable();
            $table->string('medicament_categorie')->nullable();
            $table->string('medicament_reference')->nullable();
            $table->string('medicament_prix')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('medicament');
    }
}
