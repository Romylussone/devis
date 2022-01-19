<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDemandeDevisIdToDetailDetailDemandeDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_demande_devis', function (Blueprint $table) {
            $table->integer('demande_devis_id')->unsigned()->after('id');

            $table->foreign('demande_devis_id')->references('id')->on('demande_devis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_detail_demande_devis', function (Blueprint $table) {
            //
        });
    }
}
