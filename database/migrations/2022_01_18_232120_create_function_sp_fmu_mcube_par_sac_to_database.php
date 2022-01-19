<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionSpFmuMcubeParSacToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE FUNCTION sp_fmu_mcube_par_sac(dd_conditionnement_id int)
            RETURNS decimal(10,10)
            #mcube_par_sac = mcube_par_carton/nb_atticle_par_carton
            RETURN (select volume/qte_article from dd_conditionnements where id=dd_conditionnement_id) ;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('function_sp_fmu_mcube_par_sac_to_database');
    }
}
