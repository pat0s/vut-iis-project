<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMEMBEROFTEAMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MEMBER_OF_TEAM', function (Blueprint $table) {
            $table->integer('TEAM_ID');
            $table->integer('PERSON_ID')->index('FK_MEMBER_PERSON_ID');

            $table->primary(['TEAM_ID', 'PERSON_ID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MEMBER_OF_TEAM');
    }
}
