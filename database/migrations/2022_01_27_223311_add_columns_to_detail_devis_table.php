<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDetailDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_devis', function (Blueprint $table) {
            $table->decimal('mcube_par_sac', 8, 5)->after('pu_sac_prix_exw')->nullable();
            $table->decimal('prix_par_sac_hors_transit', 8, 5)->after('mcube_par_sac')->nullable();
            $table->decimal('ptr_prix_sac_dap_paris_et_transit', 15, 5)->after('prix_par_sac_hors_transit')->nullable();
            $table->decimal('ptr_prix_par_sac_dap', 10, 7)->after('ptr_prix_sac_dap_paris_et_transit')->nullable();
            $table->decimal('ptr_mcube_par_qte_sac', 10, 5)->after('ptr_prix_par_sac_dap')->nullable();
            $table->decimal('ptr_poids_kg_par_qte_sac', 10, 2)->after('ptr_mcube_par_qte_sac')->nullable();
            //
            $table->integer('ptm_apc20pieds_nb_cartons')->after('ptr_poids_kg_par_qte_sac')->nullable();
            $table->integer('ptm_apc20pieds_poids_tot_kg')->after('ptm_apc20pieds_nb_cartons')->nullable();
            $table->decimal('ptm_apc20pieds_prix_cfr', 12, 2)->after('ptm_apc20pieds_poids_tot_kg')->nullable();
            $table->decimal('ptm_apc20pieds_prix_par_sac_pall_cont_20pieds', 8, 5)->after('ptm_apc20pieds_prix_cfr')->nullable();
            $table->decimal('ptm_apc20pieds_prix_par_cart_pall_cont_20pieds', 8, 5)->after('ptm_apc20pieds_prix_par_sac_pall_cont_20pieds')->nullable();
            $table->decimal('ptm_apc20pieds_prix_par_kg', 8, 5)->after('ptm_apc20pieds_prix_par_cart_pall_cont_20pieds')->nullable();
            //
            $table->integer('ptm_apc40pieds_nb_cartons')->after('ptm_apc20pieds_prix_par_kg')->nullable();
            $table->integer('ptm_apc40pieds_poids_tot_kg')->after('ptm_apc40pieds_nb_cartons')->nullable();
            $table->decimal('ptm_apc40pieds_prix_cfr', 12, 2)->after('ptm_apc40pieds_poids_tot_kg')->nullable();
            $table->decimal('ptm_apc40pieds_prix_par_sac_pall_cont_40pieds', 8, 5)->after('ptm_apc40pieds_prix_cfr')->nullable();
            $table->decimal('ptm_apc40pieds_prix_par_cart_pall_cont_40pieds', 8, 5)->after('ptm_apc40pieds_prix_par_sac_pall_cont_40pieds')->nullable();
            $table->decimal('ptm_apc40pieds_prix_par_kg', 8, 5)->after('ptm_apc40pieds_prix_par_cart_pall_cont_40pieds')->nullable();
            //
            $table->integer('ptm_apc40piedsHQ_nb_cartons')->after('ptm_apc40pieds_prix_par_kg')->nullable();
            $table->integer('ptm_apc40piedsHQ_poids_tot_kg')->after('ptm_apc40piedsHQ_nb_cartons')->nullable();
            $table->decimal('ptm_apc40piedsHQ_prix_cfr', 12, 2)->after('ptm_apc40piedsHQ_poids_tot_kg')->nullable();
            $table->decimal('ptm_apc40piedsHQ_prix_par_sac_pall_cont_40piedsHQ', 8, 5)->after('ptm_apc40piedsHQ_prix_cfr')->nullable();
            $table->decimal('ptm_apc40piedsHQ_prix_par_cart_pall_cont_40piedsHQ', 8, 5)->after('ptm_apc40piedsHQ_prix_par_sac_pall_cont_40piedsHQ')->nullable();
            $table->decimal('ptm_apc40piedsHQ_prix_par_kg_prix_par_kg', 8, 5)->after('ptm_apc40piedsHQ_prix_par_cart_pall_cont_40piedsHQ')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_devis', function (Blueprint $table) {
            //
        });
    }
}
