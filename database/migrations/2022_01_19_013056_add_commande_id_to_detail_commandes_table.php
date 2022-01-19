<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommandeIdToDetailCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_commandes', function (Blueprint $table) {
            $table->integer('numero_cmd')->unsigned()->after('code_article');

            $table->foreign('numero_cmd')->references('numero')->on('commandes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_commandes', function (Blueprint $table) {
            //
        });
    }
}
