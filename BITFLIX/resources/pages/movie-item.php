<?php
/** @var string $code */
/** @var array $movies*/
?>
<head>
	<link rel="stylesheet" href="./resources/css/movie-item-styles.css">
</head>
<div class = "movie-list">
	<?php
		foreach ($movies as $movie):
			$pathToImage = formatPathToImage($movie['ID']); ?>
			<div class = "movie-list--item">
				<div class = "movie-list--item-overlay">
					<a href="movie.php?id=<?=$movie['ID']?>" class="movie-list--item-more">Подробнее</a>
				</div>
				<div class = "movie-list--item-img"
					 style = "background-image: url(<?= $pathToImage ?>)">
				</div>
				<div class="movie-list--item-head">
					<div class="movie-list--item-title"><?= formatTitle($movie['TITLE'],$movie["RELEASE_DATE"])?></div>
					<div class="movie-list--item-subtitle"><?= $movie["ORIGINAL_TITLE"]?></div>
				</div>
				<div class = "movie-list--item-description"><?=$movie["DESCRIPTION"]?> </div>
				<div class = "movie-list--item-bottom">
					<div class = "movie-list--item-time">
						<div class = "movie-list--item-time--icon"></div><?= formatDuration($movie["DURATION"])?></div>
					<div class = "movie-list--item-genre"><?=($movie['GENRES'])?></div>
				</div>
			</div>
	<?php endforeach ?>
</div>
