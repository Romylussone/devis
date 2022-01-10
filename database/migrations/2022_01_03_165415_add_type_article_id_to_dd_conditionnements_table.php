<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeArticleIdToDdConditionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dd_conditionnements', function (Blueprint $table) {
            $table->integer('type_article_id')->unsigned()->after('volume');

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
        Schema::table('dd_conditionnements', function (Blueprint $table) {
            //
        });
    }
}
