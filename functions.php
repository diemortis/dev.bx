<?php
function formattedMovie($array)
{
	return ($array["title"]." (".$array["release_year"]."), ".$array["age_restriction"]."+. Rating - ".$array["rating"]);
}
function getError($value)
{
	return (is_numeric($value) && $value>=0 && $value<=100);
}