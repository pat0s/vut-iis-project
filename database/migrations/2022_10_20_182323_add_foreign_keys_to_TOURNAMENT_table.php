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
            $table->foreign(['sport_id'], 'fk_sport_id')->references(['sport_id'])->on('SPORT');
            $table->foreign(['manager_id'], 'fk_tournament_manager_id')->references(['person_id'])->on('PERSON');
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
            $table->dropForeign('fk_sport_id');
            $table->dropForeign('fk_tournament_manager_id');
        });
    }
}
