<?php
declare(strict_types = 1);
/** @var array $config */
require_once "./lib/template-functions.php";
require_once "./lib/format-string-functions.php";
require_once "./config/config.php";
require_once "./lib/connect-database-function.php";
require_once "./lib/get-genre-list-function.php";
require_once './lib/find-genre-id-function.php';
require_once './lib/get-movies-functions.php';

$mysqli = connectDatabase($config['db']);
$genres = get_genre_list($mysqli);

if (isset($_GET['genre']))
{
	$config['currentPage'] = $_GET['genre'];
}
if ($config['currentPage'] === 'favourite') {
	header("Location: ./my-movie.php");
}

$id = find_genre_id( $config['currentPage'],$genres);
$movies = get_movie_list($mysqli,$id);

$content = renderTemplate ("resources\pages\movie-item.php",[
	'code'=> $config['currentPage'],
	'movies' => $movies
]);

$mainBitflixPage = renderTemplate ("resources\pages\layout.php",[
	'content' => $content,
	'config' => $config,
	'currentPage'=>$config['currentPage'],
	'genres' => $genres,
]);
echo $mainBitflixPage;


