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
            $table->string('medicament_nom')->nullable();
            // A Supp $table->string('medicament_categorie')->nullable();
            // A Supp $table->string('medicament_reference')->nullable();
            $table->string('medicament_prix')->nullable();
            $table->string('DCI')->nullable();
            $table->string('tableau')->nullable();
            $table->string('forme')->nullable();
            $table->string('dosage')->nullable();
            $table->string('classe_therapeutique')->nullable();
            $table->string('posologie')->nullable();

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
