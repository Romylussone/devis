<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_devis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nb_sac_par_carton');
            $table->integer('nb_tot_carton');
            $table->integer('nb_tot_sac');
            $table->decimal('pu_sac_prix_exw', 5, 5);
            $table->decimal('Total', 5, 5);

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
        Schema::dropIfExists('detail_devis');
    }
}
