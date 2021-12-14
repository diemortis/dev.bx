<?php

namespace StateUserStatus;

class BannedState extends AbstractState
{

	public function activate()
	{
		$this->status->setActiveDate(new \DateTime());
	}

	public function ban()
	{

	}

	public function delete()
	{
		$this->status->setDeleteDate(new \DateTime());
	}

	public function changeState()
	{
		return new DeletedState($this->status);
	}
}