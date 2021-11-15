
<?php
/** @var array $movie */
$pathToImage = formatPathToImage($movie['id']);
$square = renderTemplate ("resources/pages/rating-square.php",[
	'rating'=>$movie['rating']
]);
?>
<div class = "movie-card">
		<div class = "movie-card-wrapper">
			<div class = "movie-card--head">
				<div class="movie-card--head-title"><?=formatTitle($movie['title'],$movie['release-date'])?></div>
				<div class="movie-card--head-icon"></div>
				<div class="movie-card--head-subtitle"><?=$movie['original-title']?>
				<div class="movie-card--head-age-restriction"><?=$movie['age-restriction'].'+'?></div></div>
			</div>
			<div class = movie-card--info>
				<div class = "movie-card--info-image"  style = "background-image: url(<?= $pathToImage ?>)"></div>
				<div class = "movie-card--info-item">
					<div class = "movie-card--info-rating">
						<div class = "movie-card--info-rating-square"><?=$square?></div>
						<div class ="movie-card--info-rating-icon"><?=$movie['rating']?></div>
					</div>
					<div class = "movie-card--info-title">О фильме</div>
					<div class = "movie-card--info-subtitle">Год производства:</div>
					<div class = "movie-card--info-text"><?=$movie['release-date']?></div>
					<div class = "movie-card--info-subtitle">Режиссер:</div>
					<div class = "movie-card--info-text"><?=$movie['director']?></div>
					<div class = "movie-card--info-subtitle">В главных ролях:</div>
					<div class = "movie-card--info-text"><?=formatArrayToString($movie['cast'])?></div>
					<div class = "movie-card--info-title">Описание</div>
					<div class = "movie-card--info-text-description"><?=$movie['description']?></div>
				</div>
			</div>

		</div>
</div>