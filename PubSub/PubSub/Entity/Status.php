<?php

namespace Entity;

class Status
{
	private $activeDate;
	private $bannedAt;
	private $bannedUntil;
	private $deleteDate;

	/**
	 * @return mixed
	 */
	public function getBannedAt()
	{
		return $this->bannedAt;
	}

	/**
	 * @param mixed $bannedAt
	 */
	public function setBannedAt($bannedAt)
	{
		$this->bannedAt = $bannedAt;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBannedUntil()
	{
		return $this->bannedUntil;
	}

	/**
	 * @param mixed $bannedUntil
	 */
	public function setBannedUntil($bannedUntil)
	{
		$this->bannedUntil = $bannedUntil;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getActiveDate()
	{
		return $this->activeDate;
	}

	/**
	 * @param mixed $activeDate
	 */
	public function setActiveDate($activeDate)
	{
		$this->activeDate = $activeDate;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDeleteDate()
	{
		return $this->deleteDate;
	}

	/**
	 * @param mixed $deleteDate
	 */
	public function setDeleteDate($deleteDate): void
	{
		$this->deleteDate = $deleteDate;
	}
}