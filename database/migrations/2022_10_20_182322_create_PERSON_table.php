<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePERSONTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PERSON', function (Blueprint $table) {
            $table->integer('PERSON_ID', true);
            $table->string('FIRST_NAME', 30)->nullable();
            $table->string('SURNAME', 30)->nullable();
            $table->string('EMAIL', 50)->nullable();
            $table->string('ADDRESS', 50)->nullable();
            $table->string('LOGIN', 30)->nullable();
            $table->string('PASSWORD')->nullable();
            $table->string('IMAGE_URL')->nullable();
            $table->integer('ROLE_ID')->nullable()->index('FK_ROLE_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PERSON');
    }
}
