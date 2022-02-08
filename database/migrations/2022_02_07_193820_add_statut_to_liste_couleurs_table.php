<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatutToListeCouleursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_couleurs_articles', function (Blueprint $table) {
            $table->enum('statut', ['deleted', 'published', 'created'])->default('created')->after('code_hex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('liste_couleurs', function (Blueprint $table) {
            //
        });
    }
}
