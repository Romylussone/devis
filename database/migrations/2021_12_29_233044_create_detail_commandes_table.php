<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_article');
            $table->integer('qte_article');
            $table->decimal('prix', 9, 4);
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
        Schema::dropIfExists('detail_commandes');
    }
}
