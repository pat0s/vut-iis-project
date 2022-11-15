<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPARTICIPANTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PARTICIPANT', function (Blueprint $table) {
            $table->foreign(['tournament_id'], 'fk_participant_tournament_id')->references(['tournament_id'])->on('TOURNAMENT')->onDelete('CASCADE');
            $table->foreign(['team_id'], 'fk_participant_team_id')->references(['team_id'])->on('TEAM');
            $table->foreign(['person_id'], 'fk_participant_person_id')->references(['person_id'])->on('PERSON');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('PARTICIPANT', function (Blueprint $table) {
            $table->dropForeign('fk_participant_tournament_id');
            $table->dropForeign('fk_participant_team_id');
            $table->dropForeign('fk_participant_person_id');
        });
    }
}
