CREATE TABLE IF NOT EXISTS language
(
	ID   char(2)      not null PRIMARY KEY,
	Name varchar(255) not null
);

INSERT INTO language(ID, NAME)
values ('ru', 'Русский'),
       ('en', 'English'),
       ('de', 'Deutsch');

CREATE TABLE movie_title
(
	MOVIE_ID    int          not null,
	LANGUAGE_ID char(2)      not null,
	TITLE       varchar(500) not null,

	PRIMARY KEY (MOVIE_ID, LANGUAGE_ID),
	FOREIGN KEY FK_MT_LANGUAGE (LANGUAGE_ID)
		REFERENCES language (ID)
		ON UPDATE RESTRICT
	    ON DELETE RESTRICT,
	FOREIGN KEY FK_MT_MOVIE (MOVIE_ID)
		REFERENCES movie (ID)
);
INSERT INTO movie_title (LANGUAGE_ID, MOVIE_ID, TITLE)
SELECT 'ru', ID, TITLE from movie;

ALTER TABLE movie DROP TITLE;

SELECT * FROM movie_title;