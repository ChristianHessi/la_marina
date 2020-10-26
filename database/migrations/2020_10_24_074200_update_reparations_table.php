<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('reparations', function (Blueprint $table) {
            $table->dropForeign(['chambre_id']);
            $table->renameColumn('chambre_id', 'reparable_id');
            $table->string('reparable_type');
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reparations', function (Blueprint $table) {
            $table->integer('chambre_id')->unsigned();
            $table->foreign('chambre_id')->references('id')->on('chambres');
            $table->dropColumn('reparable_type');
        });
    }
}
