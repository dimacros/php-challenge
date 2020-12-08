<?php

namespace App;

class Call
{
	private $contact;

	function __construct(Contact $contact)
	{
		$this->contact = $contact;
	}

	public function getContact()
	{
		return $this->contact;
	}
}