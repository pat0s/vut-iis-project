<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER generate_tournament_matches
            AFTER INSERT ON TOURNAMENT
            FOR EACH ROW
        BEGIN
            DECLARE indx INTEGER(10);
            DECLARE r INTEGER(10);
            SET indx = 1;
            SET r = NEW.number_of_participants;

            WHILE r > 1 DO

                IF indx > r THEN
                    SET indx = 1;
                    SET r = r/2;
                END IF;

                INSERT INTO TOURNAMENT_MATCH (index_of_match, round, tournament_id)
                VALUES (indx, r, NEW.tournament_id);

                SET indx=indx+1;
            END WHILE;
        END;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER generate_tournament_matches;');
    }
}
