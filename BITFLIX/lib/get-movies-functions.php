<?php

define("SELECT_ALL_FILMS", "SELECT m.ID, m.TITLE, ORIGINAL_TITLE,
					   DESCRIPTION, DURATION, AGE_RESTRICTION,
					   RELEASE_DATE, RATING, director.NAME as DIRECTOR,
					   actors.NAME as ACTORS, genres.NAME as GENRES
				FROM movie as m JOIN director on m.DIRECTOR_ID = director.ID ");
define("SELECT_ONE_FILM", "SELECT m.ID, m.TITLE, ORIGINAL_TITLE,
					   DESCRIPTION, DURATION, AGE_RESTRICTION,
					   RELEASE_DATE, RATING, director.NAME as DIRECTOR,
					   actors.NAME as ACTORS
				FROM movie as m JOIN director on m.DIRECTOR_ID = director.ID ");
define("JOIN_GENRES", "join (SELECT movie.ID, group_concat(NAME separator ', ') as NAME
					FROM movie join movie_genre mg on movie.ID = mg.MOVIE_ID
					join genre g on mg.GENRE_ID = g.ID WHERE mg.MOVIE_ID = movie.ID
						  group by movie.ID) as genres on m.ID = genres.ID ");
define("JOIN_ACTORS", "join (SELECT movie.ID, group_concat(NAME separator ', ') as NAME
					FROM movie join movie_actor ma on movie.ID = ma.MOVIE_ID
					join actor a on ma.ACTOR_ID = a.ID where ma.MOVIE_ID = movie.ID
					group by movie.ID) as actors on m.ID = actors.ID ");
define("REQUEST_THE_SAME_GENRE_FILMS", "join movie_genre mg2 on m.ID = mg2.MOVIE_ID join genre g2 on g2.ID = mg2.GENRE_ID
										where GENRE_ID = ");
define("GROUP_BY",'GROUP BY m.ID');
define("MOVIE_ID_FILTER", "where m.ID =");

function get_movie_list (mysqli $mysqli, int $genre_id = 0):array
{
	if ($genre_id === 0){
		$request = SELECT_ALL_FILMS.JOIN_GENRES.JOIN_ACTORS.' '.GROUP_BY;
	}
	else
	{
		$request = SELECT_ALL_FILMS.JOIN_GENRES.JOIN_ACTORS.' '.REQUEST_THE_SAME_GENRE_FILMS.($genre_id).' '.GROUP_BY;
	}
	$sql = $mysqli->query($request);
	$result = [];
	if ($sql)
	{
		while ($my_row = mysqli_fetch_assoc($sql))
		{
			$result [$my_row['ID']] = $my_row;
		}
	}
	if ($sql == false || !$result)
	{
		trigger_error("request failed");
	}
	return $result;
}

function get_film(mysqli $mysqli, int $film_id = 0):array
{
    $result = [];
	if ($film_id === 0)
	{
		trigger_error("The movie ID is incorrect");
	}
	else
	{
		$request = SELECT_ONE_FILM.JOIN_ACTORS . ' ' . MOVIE_ID_FILTER . ' ' . $film_id;
		if ($sql = $mysqli->query($request))
		{
			$result = mysqli_fetch_assoc($sql);
		}
		if ($sql == false || !$result)
		{
		trigger_error("request failed");
		}
	}
	return $result;
}