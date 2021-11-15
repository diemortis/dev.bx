<?php
/** @var float $rating */
for($index=1; $index <= (int)(floor($rating));$index++){?>
	<div class = "movie-card--rating-square-red"></div>
<?php }?>
<?php for($index=1; $index <= 10-floor($rating);$index++){?>
	<div class = "movie-card--rating-square-grey"></div>
<?php }?>

