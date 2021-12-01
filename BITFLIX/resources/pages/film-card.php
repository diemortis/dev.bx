
<?php
/** @var $movie */

$pathToImage = formatPathToImage($movie['ID']);
$square = renderTemplate ("resources/pages/rating-square.php",[
	'rating'=>$movie['RATING']
]);
?>
<div class = "movie-card">
		<div class = "movie-card-wrapper">
			<div class = "movie-card--head">
				<div class="movie-card--head-title"><?= formatTitle($movie['TITLE'],$movie["RELEASE_DATE"])?></div>
				<div class="movie-card--head-icon"></div>
				<div class="movie-card--head-subtitle"><?=$movie["ORIGINAL_TITLE"]?>
				<div class="movie-card--head-age-restriction"><?=$movie["AGE_RESTRICTION"].'+'?></div></div>
			</div>
			<div class = movie-card--info>
				<div class = "movie-card--info-image"  style = "background-image: url(<?= $pathToImage ?>)"></div>
				<div class = "movie-card--info-item">
					<div class = "movie-card--info-rating">
						<div class = "movie-card--info-rating-square"><?=$square?></div>
						<div class ="movie-card--info-rating-icon"><?=$movie['RATING']?></div>
					</div>
					<div class = "movie-card--info-title">О фильме</div>
					<div class = "movie-card--info-subtitle">Год производства:</div>
					<div class = "movie-card--info-text"><?=$movie["RELEASE_DATE"]?></div>
					<div class = "movie-card--info-subtitle">Режиссер:</div>
					<div class = "movie-card--info-text"><?=$movie['DIRECTOR']?></div>
					<div class = "movie-card--info-subtitle">В главных ролях:</div>
					<div class = "movie-card--info-text"><?=($movie['ACTORS'])?></div>
					<div class = "movie-card--info-title">Описание</div>
					<div class = "movie-card--info-text-description"><?=$movie['DESCRIPTION']?></div>
				</div>
			</div>

		</div>
</div>