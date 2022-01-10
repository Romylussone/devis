<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdFmCodeDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_fm_code_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol');
            $table->string('desctiption');

            // id,
            // symbol (fm, fmu, dd, d, ...),
            // descriptions
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
        Schema::dropIfExists('dd_fm_code_descriptions');
    }
}
