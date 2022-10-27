<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTOURNAMENTMATCHTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TOURNAMENT_MATCH', function (Blueprint $table) {
            $table->foreign(['PARTICIPANT1_ID'], 'FK_PARTICIPANT1_ID')->references(['PARTICIPANT_ID'])->on('PARTICIPANT');
            $table->foreign(['TOURNAMENT_ID'], 'FK_TOURNAMENT_ID')->references(['TOURNAMENT_ID'])->on('TOURNAMENT')->onDelete('CASCADE');
            $table->foreign(['PARTICIPANT2_ID'], 'FK_PARTICIPANT2_ID')->references(['PARTICIPANT_ID'])->on('PARTICIPANT');
            $table->foreign(['WINNER_ID'], 'FK_WINNER_ID')->references(['PARTICIPANT_ID'])->on('PARTICIPANT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TOURNAMENT_MATCH', function (Blueprint $table) {
            $table->dropForeign('FK_PARTICIPANT1_ID');
            $table->dropForeign('FK_TOURNAMENT_ID');
            $table->dropForeign('FK_PARTICIPANT2_ID');
            $table->dropForeign('FK_WINNER_ID');
        });
    }
}
