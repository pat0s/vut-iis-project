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
            $table->integer('MATCH_ID', true);
            $table->string('RESULT', 30)->nullable();
            $table->integer('INDEX_OF_MATCH');
            $table->integer('IS_FINISHED')->nullable()->default(0);
            $table->integer('WINNER_ID')->nullable()->index('FK_WINNER_ID');
            $table->integer('PARTICIPANT1_ID')->nullable()->index('FK_PARTICIPANT1_ID');
            $table->integer('PARTICIPANT2_ID')->nullable()->index('FK_PARTICIPANT2_ID');
            $table->integer('TOURNAMENT_ID')->index('FK_TOURNAMENT_ID');
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
