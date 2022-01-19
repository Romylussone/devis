<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDevisIdToDetailDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_devis', function (Blueprint $table) {
            $table->integer('numero_devis')->unsigned()->after('id');

            $table->foreign('numero_devis')->references('numero')->on('devis');
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
