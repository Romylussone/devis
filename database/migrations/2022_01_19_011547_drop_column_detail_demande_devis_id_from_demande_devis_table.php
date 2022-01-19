<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnDetailDemandeDevisIdFromDemandeDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demande_devis', function (Blueprint $table) {
            $table->dropForeign(['detail_demande_devis_id']);
            $table->dropColumn('detail_demande_devis_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demande_devis', function (Blueprint $table) {
            //
        });
    }
}
