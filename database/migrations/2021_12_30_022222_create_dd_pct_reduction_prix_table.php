<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdPctReductionPrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_pct_reduction_prix', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pct_reduction');
            $table->integer('qte_min');
            $table->integer('qte_max');
            $table->integer('type_interval_id')->default(1);
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
        Schema::dropIfExists('dd_pct_reduction_prix');
    }
}
