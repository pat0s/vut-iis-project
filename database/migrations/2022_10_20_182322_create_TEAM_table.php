<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEAMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TEAM', function (Blueprint $table) {
            $table->integer('team_id', true);
            $table->string('team_name', 50);
            $table->string('logo_url')->nullable();
            $table->integer('number_of_players')->nullable()->default(0);
            $table->integer('manager_id')->index('fk_team_manager_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TEAM');
    }
}
