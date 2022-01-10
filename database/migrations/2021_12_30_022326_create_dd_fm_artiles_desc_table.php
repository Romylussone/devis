<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdFmArtilesDescTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_fm_artiles_desc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_formule');
            $table->string('tm_type');
            $table->string('fm_descriptions');
            $table->timestamps();

            // id,
            // fm_name,
            // fm_type (formule_unitaire, formule de conditionnement, formule composée)
            // fm_descriptions
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_fm_artiles_desc');
    }
}
