<?php

namespace Army\Ammunition;

class AmmunitionHelper
{
	public static function getForge(string $type)
	{
		switch($type)
		{
			case 'archer':
				return new ArcherAmmunitionForge();
			case 'horseman':
				return new HorsemanAmmunitionForge();
		}
	}
}