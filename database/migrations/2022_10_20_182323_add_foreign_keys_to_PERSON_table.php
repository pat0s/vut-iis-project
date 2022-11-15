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
            $table->foreign(['role_id'], 'fk_role_id')->references(['role_id'])->on('ROLE');
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
            $table->dropForeign('fk_role_id');
        });
    }
}
