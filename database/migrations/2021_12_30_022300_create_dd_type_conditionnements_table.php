<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdTypeConditionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_type_conditionnements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');


            // id, lebelle {'cartons', 'pall_cont_20','pall_cont_40', 'pall_cont_20HQ','pall_cont_40HQ'}
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
        Schema::dropIfExists('dd_type_conditionnements');
    }
}
