<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPERSONTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PERSON', function (Blueprint $table) {
            $table->foreign(['ROLE_ID'], 'FK_ROLE_ID')->references(['ROLE_ID'])->on('ROLE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('PERSON', function (Blueprint $table) {
            $table->dropForeign('FK_ROLE_ID');
        });
    }
}
