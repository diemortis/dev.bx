<?php

namespace StateStatus;

class ActiveState extends AbstractState
{

	public function activate()
	{
	}

	public function ban()
	{
		$this->status->setBannedAt(new \DateTime());
		$this->status->setBannedUntil((new \DateTime())->modify("+ 15 days"));
	}

	public function delete()
	{
		$this->status->setDeleteDate(new \DateTime());
	}

	public function changeState()
	{
		return new BannedState($this->status);
	}
}