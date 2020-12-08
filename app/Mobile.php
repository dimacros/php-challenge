<?php

namespace App;

use App\Interfaces\CarrierInterface;
use App\Services\ContactService;

class Mobile
{
	private $provider;
	
	private $contactService;

	public function __construct(CarrierInterface $provider, ContactService $contactService)
	{
		$this->provider = $provider;
		$this->contactService = $contactService;
	}

	public function makeCallByName($name = '')
	{
		if( empty($name) ) return;

		$contact = $this->contactService->findByName($name);

		$this->provider->dialContact($contact);

		return $this->provider->makeCall();
	}
}
