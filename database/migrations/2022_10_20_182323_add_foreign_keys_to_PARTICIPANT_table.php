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
            $table->foreign(['TOURNAMENT_ID'], 'FK_PARTICIPANT_TOURNAMENT_ID')->references(['TOURNAMENT_ID'])->on('TOURNAMENT')->onDelete('CASCADE');
            $table->foreign(['TEAM_ID'], 'FK_PARTICIPANT_TEAM_ID')->references(['TEAM_ID'])->on('TEAM');
            $table->foreign(['PERSON_ID'], 'FK_PARTICIPANT_PERSON_ID')->references(['PERSON_ID'])->on('PERSON');
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
            $table->dropForeign('FK_PARTICIPANT_TOURNAMENT_ID');
            $table->dropForeign('FK_PARTICIPANT_TEAM_ID');
            $table->dropForeign('FK_PARTICIPANT_PERSON_ID');
        });
    }
}
