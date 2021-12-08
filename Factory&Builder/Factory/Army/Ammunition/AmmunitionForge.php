<?php

namespace Army\Ammunition;


abstract class AmmunitionForge
{
	abstract public function createAmmunition(): Ammunition;
}