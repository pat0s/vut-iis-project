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
            $table->integer('TEAM_ID', true);
            $table->string('TEAM_NAME', 30);
            $table->string('LOGO_URL')->nullable();
            $table->integer('NUMBER_OF_PLAYERS')->nullable()->default(0);
            $table->integer('MANAGER_ID')->index('FK_TEAM_MANAGER_ID');
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
