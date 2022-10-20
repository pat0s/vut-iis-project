<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTEAMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TEAM', function (Blueprint $table) {
            $table->foreign(['MANAGER_ID'], 'FK_TEAM_MANAGER_ID')->references(['PERSON_ID'])->on('PERSON');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TEAM', function (Blueprint $table) {
            $table->dropForeign('FK_TEAM_MANAGER_ID');
        });
    }
}
