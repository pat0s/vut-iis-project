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
            $table->integer('TOURNAMENT_ID', true);
            $table->string('TOURNAMENT_NAME', 30);
            $table->string('DESCRIPTION', 1000)->nullable();
            $table->dateTime('START_DATE');
            $table->decimal('PRICEPOOL', 20)->nullable();
            $table->integer('IS_APPROVED')->nullable()->default(0);
            $table->integer('NUMBER_OF_PARTICIPANTS')->nullable();
            $table->integer('MANAGER_ID')->index('FK_TOURNAMENT_MANAGER_ID');
            $table->integer('SPORT_ID')->index('FK_SPORT_ID');
        });
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
