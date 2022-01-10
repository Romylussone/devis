<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdCoefFixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_coef_fixes', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('coef_prix_par_gramme', 4, 4 )->default(0.003);;
            $table->integer('coef_frais_transit_certif_euro1')->default(250);;
            $table->integer('coef_frais_pallete_contenaire_20pieds')->default(1500);;
            $table->integer('coef_frais_pallete_contenaire_40pieds')->default(2300);;
            $table->integer('coef_frais_pallete_contenaire_40piedsHQ')->default(2500);
            // id, 
            // coef_prix_par_gramme = 0.003 par defaut,
            // coef_frais_transit_certif_euro1 = 250 par defaut,
            // coef_frais_pallete_contenaire_20pieds = 1500 par defaut,
            // coef_frais_pallete_contenaire_40pieds = 2300 par defaut,
            // coef_frais_pallete_contenaire_40piedsHQ = 2500 par defaut
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
        Schema::dropIfExists('dd_coef_fixes');
    }
}
