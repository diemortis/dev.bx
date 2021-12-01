<?php
declare(strict_types = 1);
/** @var array $config */
require_once "./lib/template-functions.php";
require_once "./lib/format-string-functions.php";
require_once "./config/config.php";
require_once "./lib/connect-database-function.php";
require_once "./lib/get-genre-list-function.php";
require_once './lib/get-movies-functions.php';
$mysqli = connectDatabase($config['db']);
$genres = get_genre_list($mysqli);

$id = 0;
if (isset($_GET['id']))
{
	$id =(int)$_GET['id'];
}
$movie = get_film($mysqli, $id);

$content = renderTemplate ("resources/pages/film-card.php",[
	'movie' => $movie
]);
$mainBitflixPage = renderTemplate ("resources\pages\layout.php",[
	'content' => $content,
	'config' => $config,
	'currentPage'=>$config['currentPage'],
	'genres' => $genres,
	'mysqli'=> $mysqli
]);
echo $mainBitflixPage;
