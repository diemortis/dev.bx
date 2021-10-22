<?php
/** @var array $movies */
require "movies.php";
require "functions.php";

$inputAge = readline($prompt = "Enter your age: ");
$count = 1;
if (getError($inputAge))
{
	foreach ($movies as $movie)
	{
		if ($movie["age_restriction"] <= $inputAge)
		{
			print($count . ". " . formattedMovie($movie) . "\n");
			++$count;
		}
	}
}
