<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionSpFmuPoidsSacEnGrammeToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE FUNCTION sp_fmu_poids_sac_en_gramme(taille_id int, grammage_id int)
            RETURNS decimal(5,2)
            RETURN ((select largeur * 2 from taille_articles where id=taille_id limit 1) + (select souflet * 2 from taille_articles where id=taille_id limit 1) +2 ) /100 * ((select hauteur/100 from taille_articles where id=taille_id limit 1) * (select grammage from grammage_articles where id=grammage_id limit 1));
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('function_sp_fmu_poids_sac_en_gramme_to_database');
    }
}
