<?php

namespace Army\Ammunition;


class HorsemanAmmunition extends Ammunition
{
	public function __construct()
	{
		$leftHandWeaponValue = new Knife();
		$rightHandWeaponValue = new Spear();
		parent::__construct($leftHandWeaponValue, $rightHandWeaponValue);
	}
}
