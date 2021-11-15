<?php
declare(strict_types = 1);
/** @var array $movies */
/** @var array $genres */
/** @var array $config */
require_once "./lib/template-functions.php";
require_once "./lib/format-string-functions.php";
require_once "./data/movies (3) (1) (1).php";
require_once "./data/genres.php";
require_once "./config/config.php";

$id = 0;
if (isset($_GET['id']))
{
	$id =(int)$_GET['id'];
}

$content = renderTemplate ("resources/pages/film-card.php",[
	'movie' => $movies[$id-1]
]);
$mainBitflixPage = renderTemplate ("resources\pages\layout.php",[
	'content' => $content,
	'config' => $config,
	'currentPage'=>$config['currentPage']
]);
echo $mainBitflixPage;
