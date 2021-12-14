<?php

namespace StateUserStatus;

interface StatusState
{
	public function activate();
	public function ban();
	public function delete();

	public function changeState();
}