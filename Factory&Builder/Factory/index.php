<?php

use Army\Archer;

spl_autoload_register(function ($class)
{
	include __DIR__ . '/' . str_replace("\\", "/", $class) . '.php';
});


$armyA = [];
$armyB = [];

$forges = [
	'archer',
	'horseman',
];

for ($i = 0; $i < 100; $i++)
{
	$warrior = $forges[rand(0, 1)];
	$armyA[] = [\Army\Helper::getForge($warrior)->createWarrior(), \Army\Ammunition\AmmunitionHelper::getForge($warrior)->createAmmunition()];
	$warrior = $forges[rand(0, 1)];
	$armyB[] = [\Army\Helper::getForge($warrior)->createWarrior(), \Army\Ammunition\AmmunitionHelper::getForge($warrior)->createAmmunition()];
}
var_dump($armyA[15]);


