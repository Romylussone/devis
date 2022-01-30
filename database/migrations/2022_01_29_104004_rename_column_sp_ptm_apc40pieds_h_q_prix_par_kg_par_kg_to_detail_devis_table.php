<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnSpPtmApc40piedsHQPrixParKgParKgToDetailDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_devis', function (Blueprint $table) {
            $table->renameColumn('ptm_apc40piedsHQ_prix_par_kg', 'ptm_apc40piedsHQ_prix_par_kg');
            $table->dropColumn('Total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_devis', function (Blueprint $table) {
            //
        });
    }
}
