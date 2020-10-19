<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat_chambres', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Entrée', 'Sortie']);
            $table->integer('chambre_id')->unsigned();
            $table->integer('locataire_id')->unsigned();
            $table->text('description');
            $table->date('date');
            $table->foreign('chambre_id')->references('id')->on('chambres')->onDelete('cascade');
            $table->foreign('locataire_id')->references('id')->on('locataires');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etat_chambres');
    }
}
