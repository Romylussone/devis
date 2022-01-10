<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdConditionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_conditionnements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_type_cond')->unsigned();
            $table->string('dimensions');
            $table->string('article_taille_min');
            $table->string('article_taille_max');
            $table->integer('qte_article');
            $table->decimal('volume', 10, 10);
            $table->integer('type_interval_id')->defaul(1);
            $table->timestamps();

            $table->foreign('id_type_cond')->references('id')->on('dd_type_conditionnements')->onUpdate('cascade')->onDelete('cascade');

            // id, 
            // id_type_cond,
            // dimensions,
            // article_taille_min(hxlxsouf),
            // article_taille_max (hxlxsouf),
            // qte_article(nb_atticle_par_carton, nb_sac_par_pallet_contenaire_20pieds, 
            //     nb_sac_par_pallet_contenaire_40piedsHQ, 
            //     nb_sac_par_pallet_contenaire_40pieds, ),
            // volume (null par defaut),
            // type_interval_id {1} par defuat
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_conditionnements');
    }
}
