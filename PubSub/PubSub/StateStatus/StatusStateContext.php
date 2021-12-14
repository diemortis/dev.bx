<?php

namespace StateUserStatus;

class StatusStateContext
{
	/**
	 * @var StatusState
	 */
	private $state;

	/**
	 * @param StatusState $state
	 */
	public function __construct(StatusState $initialState)
	{
		$this->state = $initialState;
	}

	public function changeState()
	{
		$this->state = $this->state->changeState();

		return $this;
	}

	/**
	 * @return StatusState
	 */
	public function getState(): StatusState
	{
		return $this->state;
	}

}