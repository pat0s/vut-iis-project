<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMEMBEROFTEAMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('MEMBER_OF_TEAM', function (Blueprint $table) {
            $table->foreign(['team_id'], 'fk_member_team_id')->references(['team_id'])->on('TEAM');
            $table->foreign(['person_id'], 'fk_member_person_id')->references(['person_id'])->on('PERSON');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('MEMBER_OF_TEAM', function (Blueprint $table) {
            $table->dropForeign('fk_member_team_id');
            $table->dropForeign('fk_member_person_id');
        });
    }
}
