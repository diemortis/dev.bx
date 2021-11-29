<?php
require_once "./lib/connect-database-function.php";
require_once "./lib/get-genre-list-function.php";
/** @var string $currentPage*/
/** @var mysqli $mysqli */

$genres = get_genre_list($mysqli);

foreach ($genres as ['CODE'=> $code, 'NAME'=>$name]): ?>
	<div class = "menu-item">
		<a class = "menu-item-link<?= $currentPage === $code ? "-active" : ""?>" href = "<?='index.php?genre='.$code?>"><?=$name?></a></div>
<?php endforeach;?>
