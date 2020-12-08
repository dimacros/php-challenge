<?php

namespace Tests\Stub;

use App\Contact;
use App\ContactNotFound;
use App\Interfaces\ContactRepository;

final class ContactInMemoryRepository implements ContactRepository
{
    /** @var Contact[] */
    private $contacts;

    public function __construct(array $contacts = [])
    {
        $this->contacts = $contacts;
    }

    public function findByName(string $name): Contact
    {
        $contactsFound = array_filter($this->contacts, function (Contact $contact) use ($name) {
            return $contact->getName() === $name;
        });

        if (count($contactsFound) !== 1) {
          throw new ContactNotFound();
        }

        return $contactsFound[0];
    }
}
