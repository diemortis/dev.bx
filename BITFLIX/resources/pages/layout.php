<?php
/** @var array $movies */
/** @var string $content*/
/** @var string $currentPage*/
/** @var array $config */

$mysqli = connectDatabase($config['db']);
$menu = renderTemplate('./resources/pages/menu-genres.php',[
					   'currentPage'=>$currentPage,
					   'mysqli' => $mysqli]);
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bitflix</title>
	<link rel="stylesheet" href="./resources/css/reset.css">
	<link rel="stylesheet" href="./resources/css/style.css">
	<link rel="stylesheet" href="./resources/css/movie-card-styles.css">

</head>
<body/>
<div class = "wrapper">
	<div class = "sidebar">
		<div class = "logo"></div>
		<div class = "menu">
			<?php
			foreach ($config['menu'] as  $code=>$name): ?>
				<div class = "menu-item">
					<a class = "menu-item-link<?= $currentPage === $code ? "-active" : ""?>" href = "<?='index.php?genre='.$code?>"><?=$name?></a></div>
			<?php endforeach;?>
			<?= $menu ?>

		</div>
	</div>
	<div class = "container">
		<div class = "header"></div>
		<div class = "content">
			<?= $content ?>

		</div>
	</div>

</div>
</body>
</html>