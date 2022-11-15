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
            $table->integer('participant_id', true);
            $table->string('participant_name', 50);
            $table->integer('is_approved')->nullable()->default(0);
            $table->string('participant_type', 6);
            $table->integer('team_id')->nullable()->index('fk_participant_team_id');
            $table->integer('person_id')->nullable()->index('fk_participant_person_id');
            $table->integer('tournament_id')->index('fk_participant_tournament_id');
        });

        // Add constraints
        DB::statement('ALTER TABLE PARTICIPANT ADD CONSTRAINT is_approved CHECK (is_approved in (0,1));');
        DB::statement('ALTER TABLE PARTICIPANT ADD CONSTRAINT participant_type CHECK(participant_type IN (\'team\', \'person\'));');
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
