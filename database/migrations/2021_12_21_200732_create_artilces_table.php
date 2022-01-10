<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtilcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->integer('type_article_id')->unsigned();
            $table->integer('taille_article_id')->unsigned();
            $table->integer('grammage_article_id')->unsigned();
            $table->integer('type_impresion_article_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('type_article_id')->references('id')->on('type_articles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('taille_article_id')->references('id')->on('taille_articles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('grammage_article_id')->references('id')->on('grammage_articles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_impresion_article_id')->references('id')->on('type_impression_articles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artilces');
    }
}
