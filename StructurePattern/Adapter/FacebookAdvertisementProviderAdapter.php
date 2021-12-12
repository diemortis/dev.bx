<?php

namespace Adapter;
use Entity\Advertisement;
use Entity\AdvertisementResponse;
use External\FacebookAdvertisement;
use External\FacebookPublicator;
use Service\AdvertisementProviderInterface;

class FacebookAdvertisementProviderAdapter implements AdvertisementProviderInterface
{
	public function publicate(Advertisement $advertsement): AdvertisementResponse
	{
		$facebookAdvertisement = new FacebookAdvertisement();

		if (!$advertsement->getTitle())
		{
			$advertsement->setTitle("default");
		}
		$facebookAdvertisement
			->setTitle($advertsement->getTitle())
			->setMessageBody($advertsement->getBody());

		$result = (new FacebookPublicator())->publicate($facebookAdvertisement);

		return (new AdvertisementResponse())->setTargeting($result->getTargetingName());
	}
	public function prepare(Advertisement $advertsement)
	{
	}
	public function check(Advertisement $advertsement)
	{
	}
	public function calculateDuration(Advertisement $advertsement)
	{
	}

}