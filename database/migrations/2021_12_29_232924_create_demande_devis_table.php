<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_devis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detail_demande_devis_id')->unsigned();
            $table->integer('entreprise_id')->unsigned();
            $table->date('date_demande');

            $table->timestamps();

            $table->foreign('detail_demande_devis_id')->references('id')->on('detail_demande_devis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_devis');
    }
}
