<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeArticleIdToDdCoefFixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dd_coef_fixes', function (Blueprint $table) {
            $table->integer('type_article_id')->unsigned()->after('coef_frais_pallete_contenaire_40piedsHQ');

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
        Schema::table('dd_coef_fixes', function (Blueprint $table) {
            //
        });
    }
}
