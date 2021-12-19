<?php

namespace StateStatus;

class DeletedState extends AbstractState
{
	public function activate()
	{
	}

	public function ban()
	{
	}

	public function delete()
	{
	}

	public function changeState()
	{
		return $this;
	}
}