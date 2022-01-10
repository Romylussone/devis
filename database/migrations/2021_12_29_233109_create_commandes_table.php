<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('numero');
            
            $table->integer('code_client')->unsigned();
            $table->integer('detail_cmd_id')->unsigned();
            $table->string('code_payement');
            $table->integer('statut');
            $table->string('adresse_livraison')->nullable();
            $table->timestamps();

            $table->foreign('code_client')->references('code')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('detail_cmd_id')->references('id')->on('detail_commandes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('code_payement')->references('code')->on('payements')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
