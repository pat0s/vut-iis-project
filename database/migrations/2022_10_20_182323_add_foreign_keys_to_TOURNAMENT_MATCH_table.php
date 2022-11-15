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
            $table->foreign(['participant1_id'], 'fk_participant1_id')->references(['participant_id'])->on('PARTICIPANT');
            $table->foreign(['tournament_id'], 'fk_tournament_id')->references(['tournament_id'])->on('TOURNAMENT')->onDelete('CASCADE');
            $table->foreign(['participant2_id'], 'fk_participant2_id')->references(['participant_id'])->on('PARTICIPANT');
            $table->foreign(['winner_id'], 'fk_winner_id')->references(['participant_id'])->on('PARTICIPANT');
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
            $table->dropForeign('fk_participant1_id');
            $table->dropForeign('fk_tournament_id');
            $table->dropForeign('fk_participant2_id');
            $table->dropForeign('fk_winner_id');
        });
    }
}
