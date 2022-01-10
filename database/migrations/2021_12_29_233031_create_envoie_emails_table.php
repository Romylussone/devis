<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvoieEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envoie_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('object_id');
            $table->string('description')->nullable();
            $table->string('reponse')->nullable();
            $table->date('date_reponse')->nullable();
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
        Schema::dropIfExists('envoie_emails');
    }
}
