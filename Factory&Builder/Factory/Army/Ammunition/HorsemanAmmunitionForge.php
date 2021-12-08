<?php

namespace Army\Ammunition;


class HorsemanAmmunitionForge extends AmmunitionForge
{
	public function createAmmunition(): Ammunition
	{

		$horsemanAmmunition = new HorsemanAmmunition();
		return $horsemanAmmunition;
	}
}