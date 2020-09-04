<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('motif');
            $table->date('date');
            $table->integer('montant');
            $table->string('technicien');
            $table->string('tel_technicien');
            $table->text('observations');
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
        Schema::drop('reparations');
    }
}
