<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGrammageArticleIdToDdConditionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dd_conditionnements', function (Blueprint $table) {
            $table->integer('grammage_article_id')->unsigned()->after('type_article_id');

            $table->foreign('grammage_article_id')->references('id')->on('grammage_articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dd_conditionnements', function (Blueprint $table) {
            //
        });
    }
}
