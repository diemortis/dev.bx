<?php

namespace Army\Ammunition;

class Ammunition
{
	private
		$leftHandWeapon, $rightHandWeapon;

	public function __construct(?Weapon $leftHandWeaponValue = null, ?Weapon $rightHandWeaponValue = null)
	{
		$this->leftHandWeapon = $leftHandWeaponValue;
		$this->rightHandWeapon = $rightHandWeaponValue;
	}
}