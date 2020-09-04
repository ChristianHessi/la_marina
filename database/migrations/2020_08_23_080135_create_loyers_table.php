<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoyersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loyers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('montant');
            $table->date('date_versement');
            $table->date('debut');
            $table->date('fin');
            $table->integer('locataire_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('locataire_id')->references('id')->on('locataires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loyers');
    }
}
