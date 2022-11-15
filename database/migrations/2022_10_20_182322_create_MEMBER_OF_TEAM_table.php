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
            $table->integer('team_id');
            $table->integer('person_id')->index('fk_member_person_id');

            $table->primary(['team_id', 'person_id']);
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
