<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->integer('etage');
            $table->integer('montant_loyer');
            $table->text('description');
            $table->integer('batiment_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('batiment_id')->references('id')->on('batiments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chambres');
    }
}
