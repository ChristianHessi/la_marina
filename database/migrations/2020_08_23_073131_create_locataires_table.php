<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocatairesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locataires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('tel');
            $table->string('email');
            $table->date('date_entree');
            $table->date('date_fin');
            $table->boolean('actif');
            $table->integer('chambre_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('chambre_id')->references('id')->on('chambres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('locataires');
    }
}
