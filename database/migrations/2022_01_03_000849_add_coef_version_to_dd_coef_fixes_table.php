<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoefVersionToDdCoefFixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dd_coef_fixes', function (Blueprint $table) {
            $table->string('coef_version')->default('1.0');
            $table->boolean('is_current_version')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dd_coef_fixes', function (Blueprint $table) {
            //
        });
    }
}
