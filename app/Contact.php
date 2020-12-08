<?php

namespace App;

final class Contact
{
	private $name;
	
	private $number;

	public function __construct(string $name, string $number)
	{
		$this->name = $name;
		$this->number = $number;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getNumber()
	{
		return $this->number;
	}
}