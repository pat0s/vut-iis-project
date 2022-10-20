<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePARTICIPANTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PARTICIPANT', function (Blueprint $table) {
            $table->integer('PARTICIPANT_ID', true);
            $table->string('PARTICIPANT_NAME', 30)->nullable();
            $table->integer('IS_APPROVED')->nullable()->default(0);
            $table->string('PARTICIPANT_TYPE', 6);
            $table->integer('TEAM_ID')->nullable()->index('FK_PARTICIPANT_TEAM_ID');
            $table->integer('PERSON_ID')->nullable()->index('FK_PARTICIPANT_PERSON_ID');
            $table->integer('TOURNAMENT_ID')->index('FK_PARTICIPANT_TOURNAMENT_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PARTICIPANT');
    }
}
