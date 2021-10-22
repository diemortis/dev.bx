<?php
/** @var array $movies */
require "movies.php";
require "functions.php";

$inputAge = readline($prompt = "Enter your age: ");
$count = 1;
if (!getError($inputAge))
{
	echo "error";
	return false;
}
foreach ($movies as $movie)
{
	if ($movie["age_restriction"] > $inputAge)
	{
		continue;
	}
	print($count . ". " . formattedMovie($movie) . "\n");
	++$count;
}
