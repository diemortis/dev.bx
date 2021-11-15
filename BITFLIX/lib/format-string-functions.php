<?php


function formatPathToImage(int $id): string{
	return ('./data/img/'.$id.'.jpg');
}
 function formatDuration(int $duration): string{
	$hours = (string)floor($duration / 60);
	$minutes = (string)($duration % 60);
	if ($hours < 10)
	{
		return ($duration . ' мин. / 0' . $hours . ':' . $minutes);
	}
	return ( $duration.' мин. / '.$hours.':'.$minutes);
}

function formatTitle(string $title,int $release_date): string{
	return ( $title.' ('.$release_date.')');
}
function formatArrayToString(array $array): string{
	$outputString = '';
	foreach ($array as $element):
		if ($outputString === ''):
			$outputString .= (string)$element;
		else:
			$outputString .= ', '.(string)$element;
		endif;
	endforeach;
	return $outputString;
}
