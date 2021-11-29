<?php

function get_genre_list (mysqli $mysqli):array
{
	$request = "SELECT * FROM genre";
	$sql = $mysqli->query($request);
	$result = [];
	while ($my_row = mysqli_fetch_assoc($sql)) {
		$result[$my_row['ID']] = ['CODE'=>$my_row['CODE'],'NAME'=>$my_row['NAME']];
	}
	return($result);
}
