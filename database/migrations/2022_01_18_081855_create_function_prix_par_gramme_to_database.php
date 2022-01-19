<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionPrixParGrammeToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE FUNCTION sp_fmu_prix_par_gramme(nb_couleur int, type_article_id int)
            RETURNS decimal(5,5)
            RETURN (select coef_prix_par_gramme  from dd_coef_fixes where type_article_id = type_article_id limit 1) + (nb_couleur * (select coef_prix_par_gramme  from dd_coef_fixes where type_article_id = type_article_id limit 1) * 15/100);
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sp_prix_par_gramme');
    }
}
