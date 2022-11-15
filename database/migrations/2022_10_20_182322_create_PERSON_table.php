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
            $table->integer('person_id', true);
            $table->string('first_name', 50);
            $table->string('surname', 50);
            $table->string('email', 255);
            $table->string('address', 255)->nullable();
            $table->string('username', 30)->nullable()->unique();
            $table->string('password');
            $table->string('image_url')->nullable();
            $table->integer('role_id')->nullable()->index('fk_role_id');
        });

        // Add constraint
        DB::statement('ALTER TABLE PERSON ADD CONSTRAINT check_email CHECK (email LIKE \'%___@___%\');');

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
