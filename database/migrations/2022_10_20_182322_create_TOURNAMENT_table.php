<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTOURNAMENTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TOURNAMENT', function (Blueprint $table) {
            $table->integer('tournament_id', true);
            $table->string('tournament_name', 50);
            $table->string('description', 1000)->nullable();
            $table->dateTime('start_date');
            $table->decimal('pricepool', 20)->nullable();
            $table->integer('is_approved')->nullable()->default(0);
            $table->integer('number_of_participants')->nullable();
            $table->integer('manager_id')->index('fk_tournament_manager_id');
            $table->integer('sport_id')->index('fk_sport_id');
        });

        // Add constraints
        DB::statement('ALTER TABLE TOURNAMENT ADD CONSTRAINT is_approved CHECK (is_approved in (0,1));');
        DB::statement('ALTER TABLE TOURNAMENT ADD CONSTRAINT number_of_participants CHECK (number_of_participants IN (4, 8, 16, 32, 64));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TOURNAMENT');
    }
}
