<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTOURNAMENTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TOURNAMENT', function (Blueprint $table) {
            $table->foreign(['SPORT_ID'], 'FK_SPORT_ID')->references(['SPORT_ID'])->on('SPORT');
            $table->foreign(['MANAGER_ID'], 'FK_TOURNAMENT_MANAGER_ID')->references(['PERSON_ID'])->on('PERSON');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TOURNAMENT', function (Blueprint $table) {
            $table->dropForeign('FK_SPORT_ID');
            $table->dropForeign('FK_TOURNAMENT_MANAGER_ID');
        });
    }
}
