
#3. Вывести самый длительный фильм Джеймса Кэмерона*.
#Формат: ID фильма, Название на русском языке, Длительность.
SELECT ID,
       mt.TITLE,
       LENGTH
from movie inner join movie_title mt on movie.ID = mt.MOVIE_ID
WHERE LANGUAGE_ID = 'ru'
  and LENGTH = (SELECT MAX(LENGTH) from movie WHERE DIRECTOR_ID = 1);

/*4. ** Вывести список фильмов с названием, сокращённым до 10 символов.
  Если название короче 10 символов – оставляем как есть.
  Если длиннее – сокращаем до 10 символов и добавляем многоточие.
 Формат: ID фильма, сокращённое название
*/
SELECT ID,
       IF (CHAR_LENGTH(TITLE)>10, CONCAT(LEFT(TITLE, 10),'...'),TITLE) as NEW_NAME
from movie inner join movie_title mt on movie.ID = mt.MOVIE_ID;

/*5. Вывести количество фильмов, в которых снимался каждый актёр.
   Формат: Имя актёра, Количество фильмов актёра.*/

SELECT
	actor.NAME as ACTOR_NAME,
	COUNT(movie_actor.MOVIE_ID) as MOVIE_COUNT
FROM
	movie_actor
		INNER JOIN actor on movie_actor.ACTOR_ID = actor.ID
GROUP BY actor.NAME;

/*6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.
  Формат: ID жанра, название*/
SELECT ID as ID_GENRE, NAME as NAME_GENRE
from genre
WHERE ID NOT IN (SELECT GENRE_ID
                 FROM movie_genre JOIN movie_actor ma on movie_genre.MOVIE_ID = ma.MOVIE_ID
                 WHERE ACTOR_ID = 1);

/*7.Вывести список фильмов, у которых больше 3-х жанров.
  Формат: ID фильма, название на русском языке*/

SELECT
     mt.MOVIE_ID,
     mt.TITLE
from movie inner join movie_title mt on movie.ID = mt.MOVIE_ID
	 inner join movie_genre mg on movie.ID = mg.MOVIE_ID
WHERE LANGUAGE_ID = 'ru'
GROUP BY mt.MOVIE_ID,TITLE
HAVING COUNT(GENRE_ID) > 3



