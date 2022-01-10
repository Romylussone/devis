<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdPrixTransportParArticleFranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_prix_transport_par_article_france', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('prix', 9, 4);
            $table->integer('hmin');
            $table->integer('hmax');
            $table->integer('largeurmin');
            $table->integer('largeurmax');
            $table->integer('soufletmin');
            $table->integer('soufletmax');
            $table->integer('type_interval_id')->defaul(1);

            // id,
            // prix,
            // hmin, hmax, 
            // largeurmin, largeurmax,
            // soufletmin, soufletmax,
            // type_interval_id {1} par defuat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_prix_transport_par_article_france');
    }
}
