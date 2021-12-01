<?php
function find_genre_id(string $genre, array $genres):int {
	$count = 0;
	if ($genre === 'index' ){
		return 0;
	}
	foreach ($genres as ['CODE'=>$code,'NAME'=>$name]){
		$count ++;
		if ($code === $genre)
		{
			return $count;
		}
	}
	return -1;
}