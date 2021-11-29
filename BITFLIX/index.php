<?php
declare(strict_types = 1);
/** @var array $movies */
/** @var array $genres */
/** @var array $config */
require_once "./lib/template-functions.php";
require_once "./lib/format-string-functions.php";
require_once "./lib/connect-database-function.php";
require_once "./data/movies (3) (1) (1).php";
require_once "./data/genres.php";
require_once "./config/config.php";



if (isset($_GET['genre']))
{
	$config['currentPage'] = $_GET['genre'];
}
if ($config['currentPage'] === 'favourite') {
	header("Location: ./my-movie.php");
}

	$content = renderTemplate ("resources\pages\movie-item.php",[
	'movies' => $movies,
	'code'=> $config['currentPage'],
	'genres'=> $genres
]);
$mainBitflixPage = renderTemplate ("resources\pages\layout.php",[
	'content' => $content,
	'config' => $config,
	'currentPage'=>$config['currentPage']
]);
echo $mainBitflixPage;


