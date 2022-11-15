DROP TABLE TOURNAMENT_MATCH CASCADE;
DROP TABLE MEMBER_OF_TEAM;
DROP TABLE PARTICIPANT;
DROP TABLE TOURNAMENT;
DROP TABLE TEAM;
DROP TABLE PERSON;
DROP TABLE ROLE;
DROP TABLE SPORT;

CREATE TABLE ROLE(
    role_id INTEGER NOT NULL AUTO_INCREMENT,
    role_name VARCHAR(30) NOT NULL,

    CONSTRAINT PK_ROLE_ID PRIMARY KEY (role_id)
);

CREATE TABLE PERSON(
    person_id INTEGER NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(30),
    surname VARCHAR(30),
    email VARCHAR(50) CHECK(email LIKE '%___@___%'),
    address VARCHAR(50),
    username VARCHAR(30) UNIQUE,
    password VARCHAR(255),
    image_url VARCHAR(255),

    role_id INTEGER DEFAULT NULL,

    CONSTRAINT PK_PERSON_ID PRIMARY KEY (person_id),
    CONSTRAINT FK_ROLE_ID FOREIGN KEY (role_id) REFERENCES ROLE(role_id)
);

CREATE TABLE SPORT(
    sport_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    number_of_players INTEGER NOT NULL,

    CONSTRAINT PK_SPORT_ID PRIMARY KEY (sport_id)
);

CREATE TABLE TOURNAMENT(
    tournament_id INTEGER NOT NULL AUTO_INCREMENT,
    tournament_name VARCHAR(30) NOT NULL,
    description VARCHAR(1000),
    start_date DATETIME NOT NULL,
    pricepool DECIMAL(20,2),
    is_approved INTEGER(1) DEFAULT 0 CHECK (is_approved IN (0,1)),
    number_of_participants INTEGER CHECK (number_of_participants IN (4, 8, 16, 32, 64)),
    manager_id INTEGER NOT NULL,
    sport_id INTEGER NOT NULL,

    CONSTRAINT PK_TOURNAMENT_ID PRIMARY KEY (tournament_id),
    CONSTRAINT FK_TOURNAMENT_MANAGER_ID FOREIGN KEY (manager_id) REFERENCES PERSON(person_id),
    CONSTRAINT FK_SPORT_ID FOREIGN KEY (sport_id) REFERENCES SPORT(sport_id)
);


CREATE TABLE TEAM(
    team_id INTEGER NOT NULL AUTO_INCREMENT,
    team_name VARCHAR(30) NOT NULL,
    logo_url VARCHAR(255),
    number_of_players INTEGER DEFAULT 0,
    manager_id INTEGER NOT NULL,

    CONSTRAINT PK_TEAM_ID PRIMARY KEY (team_id),
    CONSTRAINT FK_TEAM_MANAGER_ID FOREIGN KEY (manager_id) REFERENCES PERSON(person_id)
);

CREATE TABLE MEMBER_OF_TEAM(
    team_id INTEGER NOT NULL,
    person_id INTEGER NOT NULL,

    CONSTRAINT PK_MEMBER_OF_TEAM_ID PRIMARY KEY(team_id, person_id),
    CONSTRAINT FK_MEMBER_TEAM_ID FOREIGN KEY (team_id) REFERENCES TEAM(team_id),
    CONSTRAINT FK_MEMBER_PERSON_ID FOREIGN KEY (person_id) REFERENCES PERSON(person_id)
);

CREATE TABLE PARTICIPANT(
    participant_id INTEGER NOT NULL AUTO_INCREMENT,
    participant_name VARCHAR(30),
    is_approved INTEGER(1) DEFAULT 0 CHECK (is_approved in (0,1)),
    participant_type VARCHAR(6) NOT NULL CHECK(participant_type IN ('team', 'person')),
    team_id INTEGER NULL,
    person_id INTEGER NULL,
    tournament_id INTEGER NOT NULL,

    CONSTRAINT PK_PARTICIPANT_ID PRIMARY KEY (participant_id),
    CONSTRAINT FK_PARTICIPANT_TEAM_ID FOREIGN KEY (team_id) REFERENCES TEAM(team_id),
    CONSTRAINT FK_PARTICIPANT_PERSON_ID FOREIGN KEY (person_id) REFERENCES PERSON(person_id),
    CONSTRAINT FK_PARTICIPANT_TOURNAMENT_ID FOREIGN KEY (tournament_id) REFERENCES TOURNAMENT(tournament_id) ON DELETE CASCADE
);

CREATE TABLE TOURNAMENT_MATCH(
    match_id INTEGER NOT NULL AUTO_INCREMENT,
    result VARCHAR(30),
    index_of_match INTEGER NOT NULL,
    round INTEGER NOT NULL,
    is_finished INTEGER(1) DEFAULT 0 CHECK (is_finished in (0,1)),
    winner_id INTEGER NULL,
    participant1_id INTEGER NULL,
    participant2_id INTEGER NULL,
    tournament_id INTEGER NOT NULL,

    CONSTRAINT PK_MATCH_ID PRIMARY KEY (match_id),
    CONSTRAINT FK_WINNER_ID FOREIGN KEY (winner_id) REFERENCES PARTICIPANT(participant_id),
    CONSTRAINT FK_PARTICIPANT1_ID FOREIGN KEY (participant1_id) REFERENCES PARTICIPANT(participant_id),
    CONSTRAINT FK_PARTICIPANT2_ID FOREIGN KEY (participant2_id) REFERENCES PARTICIPANT(participant_id),
    CONSTRAINT FK_TOURNAMENT_ID FOREIGN KEY (tournament_id) REFERENCES TOURNAMENT(tournament_id) ON DELETE CASCADE
);

DELIMITER $$

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
END;$$

DElIMITER ;
