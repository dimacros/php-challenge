<?php

namespace Tests;

use App\Contact;
use App\ContactNotFound;
use App\Mobile;
use App\Services\ContactService;
use PHPUnit\Framework\TestCase;
use Tests\Stub\ContactInMemoryRepository;
use Tests\Stub\LocalCarrier;

class MobileTest extends TestCase
{
	/** @test */
	public function it_returns_null_when_name_empty()
	{
		$mobile = new Mobile(
			new LocalCarrier(), 
			new ContactService(new ContactInMemoryRepository())
		);

		$this->assertNull($mobile->makeCallByName(''));
	}

	/** @test */
	public function it_throw_exception_when_not_found_by_name()
	{
		$mobile = new Mobile(
			new LocalCarrier(), 
			new ContactService(new ContactInMemoryRepository())
		);

		$this->expectException(ContactNotFound::class);

		$mobile->makeCallByName('Marcos');
	}

	/** @test */
	public function it_call_successfully_when_contact_is_found()
	{
		$contactRepository = new ContactInMemoryRepository([
			new Contact("Marcos", "123456789"),
			new Contact("David", "987654321"),
		]);
		$mobile = new Mobile(
			new LocalCarrier(), 
			new ContactService($contactRepository)
		);

		$call = $mobile->makeCallByName('Marcos');

		$this->assertTrue($call->getContact()->getName() === 'Marcos');
	}
}
