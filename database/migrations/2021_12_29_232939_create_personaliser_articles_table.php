<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaliserArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personaliser_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_article');
            $table->string('couleur')->nullable();
            $table->integer('nb_couleur')->default(0);
            $table->string('chemin_logo')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();

            $table->foreign('code_article')->references('code')->on('articles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personaliser_articles');
    }
}
