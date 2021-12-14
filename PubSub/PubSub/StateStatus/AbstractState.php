<?php

namespace StateUserStatus;

use Entity\Status;

abstract class AbstractState implements StatusState
{
	/**
	 * @var Status
	 */
	protected $status;

	/**
	 * @param $status
	 */
	public function __construct($status)
	{
		$this->status = $status;
	}

}