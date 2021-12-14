<?php

namespace Army\Ammunition;



class ArcherAmmunition extends Ammunition
{
	public function __construct()
	{
		$leftHandWeaponValue = new Bow();
		parent::__construct($leftHandWeaponValue, );
	}
}