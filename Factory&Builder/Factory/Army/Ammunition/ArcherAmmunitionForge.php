<?php

namespace Army\Ammunition;


class ArcherAmmunitionForge extends AmmunitionForge
{
	public function createAmmunition(): Ammunition
	{
		$archerAmmunition = new ArcherAmmunition();
		return $archerAmmunition;
	}
}