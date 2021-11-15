<?php
/** @var array $movies */
/** @var array $genres */
/** @var string $code */

?>
<head>
	<link rel="stylesheet" href="./resources/css/movie-item-styles.css">
</head>
<div class = "movie-list">
	<?php
		foreach ($movies as $movie):
			$pathToImage = formatPathToImage($movie['id']);
			if ($code === 'index' || (isset($genres[$code]) && in_array($genres[$code], $movie['genres'], true))){?>
			<div class = "movie-list--item">
				<div class = "movie-list--item-overlay">
					<a href="movie.php?id=<?=(string)$movie['id']?>" class="movie-list--item-more">Подробнее</a>
				</div>
				<div class = "movie-list--item-img"
					 style = "background-image: url(<?= $pathToImage ?>)">
				</div>
				<div class="movie-list--item-head">
					<div class="movie-list--item-title"><?= formatTitle($movie['title'],$movie['release-date'])?></div>
					<div class="movie-list--item-subtitle"><?= $movie['original-title']?></div>
				</div>
				<div class = "movie-list--item-description"><?=$movie['description']?> </div>
				<div class = "movie-list--item-bottom">
					<div class = "movie-list--item-time">
						<div class = "movie-list--item-time--icon"></div><?= formatDuration($movie['duration'])?></div>
					<div class = "movie-list--item-genre"><?=formatArrayToString($movie['genres'])?></div>
				</div>
			</div>
	<?php  }
			endforeach ?>
</div>
