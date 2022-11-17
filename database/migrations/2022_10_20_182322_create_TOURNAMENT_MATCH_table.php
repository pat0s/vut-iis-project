<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTOURNAMENTMATCHTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TOURNAMENT_MATCH', function (Blueprint $table) {
            $table->integer('match_id', true);
            $table->integer('participant1_result')->nullable();
            $table->integer('participant2_result')->nullable();
            $table->integer('index_of_match');
            $table->integer('is_finished')->nullable()->default(0);
            $table->integer('winner_id')->nullable()->index('fk_winner_id');
            $table->integer('participant1_id')->nullable()->index('fk_participant1_id');
            $table->integer('participant2_id')->nullable()->index('fk_participant2_id');
            $table->integer('tournament_id')->index('fk_tournament_id');
        });

        // Add constraint
        DB::statement('ALTER TABLE TOURNAMENT_MATCH ADD CONSTRAINT is_finished CHECK (is_finished in (0,1));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TOURNAMENT_MATCH');
    }
}
