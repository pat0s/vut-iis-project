<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEndDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TOURNAMENT', function (Blueprint $table) {
            $table->dateTime('end_date');
        });

        DB::statement('ALTER TABLE TOURNAMENT ADD CONSTRAINT check_dates CHECK (start_date < end_date);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TOURNAMENT', function (Blueprint $table) {
            $table->dropColumn('end_date');
        });
    }
}
