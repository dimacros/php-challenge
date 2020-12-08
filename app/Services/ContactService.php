<?php

namespace App\Services;

use App\Contact;
use App\Interfaces\ContactRepository;

class ContactService
{
	private $contactRepository;

	public function __construct(ContactRepository $contactRepository)
	{
		$this->contactRepository = $contactRepository;		
	}

	public function findByName($name): Contact
	{
		return $this->contactRepository->findByName($name);
	}

	public function validateNumber(string $number): bool
	{
		return filter_var($number, FILTER_VALIDATE_REGEXP, ['options' => [
			'regexp' => '/[[0-9]{9}]/']
		]);
	}
}
