<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDdPrixTransportParArticleFranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dd_prix_transport_par_article_france', function (Blueprint $table) {
            $table->integer('type_article_id')->unsigned()->after('type_interval_id');

            $table->foreign('type_article_id')->references('id')->on('type_articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dd_prix_transport_par_article_france', function (Blueprint $table) {
            //
        });
    }
}
