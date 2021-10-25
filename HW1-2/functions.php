<?php
function formatMovie($array)
{
	return ($array["title"]." (".$array["release_year"]."), ".$array["age_restriction"]."+. Rating - ".$array["rating"]);
}
function checkAge($value)
{
	return (is_numeric($value) && (int)$value>=0 && (int)$value<=100);
}