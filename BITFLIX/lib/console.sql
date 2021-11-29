#Запрос на вывод всех фильмов со всей инфой
SELECT m.ID, m.TITLE, ORIGINAL_TITLE,
       DESCRIPTION, DURATION, AGE_RESTRICTION,
       RELEASE_DATE, RATING, director.NAME as DIRECTOR,
       actors.NAME as ACTORS, genres.NAME as GENRES
FROM movie as m JOIN director on m.DIRECTOR_ID = director.ID
	join (SELECT movie.ID, group_concat(NAME separator ', ') as NAME
				FROM movie join movie_actor ma on movie.ID = ma.MOVIE_ID
					 join actor a on ma.ACTOR_ID = a.ID
	            group by movie.ID) as actors on m.ID = actors.ID
	join (SELECT movie.ID, group_concat(NAME separator ', ') as NAME
				FROM movie join movie_genre mg on movie.ID = mg.MOVIE_ID
				join genre g on mg.GENRE_ID = g.ID
	       group by movie.ID) as genres on m.ID = genres.ID
GROUP BY m.ID;

SELECT movie.TITLE,
       movie.ID,
       group_concat(NAME separator ', ') as NAME
FROM movie join movie_actor ma on movie.ID = ma.MOVIE_ID
	join actor a on ma.ACTOR_ID = a.ID
WHERE ma.MOVIE_ID = movie.ID
GROUP BY movie.ID

SELECT movie.TITLE,
       movie.ID,
       group_concat(NAME separator ', ') as NAME
FROM movie join movie_genre mg on movie.ID = mg.MOVIE_ID
	join genre g on mg.GENRE_ID = g.ID
WHERE mg.MOVIE_ID = movie.ID
GROUP BY movie.ID

