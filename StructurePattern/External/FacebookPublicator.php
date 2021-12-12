<?php

namespace External;

class FacebookPublicator
{
	public function publicate(FacebookAdvertisement $advertisement): FacebookAdvertisementResult
	{
		//...

		return (new FacebookAdvertisementResult())->setTargetingName("response");
	}
}