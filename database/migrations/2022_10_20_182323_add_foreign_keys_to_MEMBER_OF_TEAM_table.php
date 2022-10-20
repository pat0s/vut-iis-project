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
            $table->foreign(['TEAM_ID'], 'FK_MEMBER_TEAM_ID')->references(['TEAM_ID'])->on('TEAM');
            $table->foreign(['PERSON_ID'], 'FK_MEMBER_PERSON_ID')->references(['PERSON_ID'])->on('PERSON');
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
            $table->dropForeign('FK_MEMBER_TEAM_ID');
            $table->dropForeign('FK_MEMBER_PERSON_ID');
        });
    }
}
