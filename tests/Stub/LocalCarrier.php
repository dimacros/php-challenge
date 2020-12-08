<?php

namespace Tests\Stub;

use App\Call;
use App\Contact;
use App\Interfaces\CarrierInterface;

final class LocalCarrier implements CarrierInterface
{
    private $contact;

    public function dialContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function makeCall(): Call
    {
        return new Call($this->contact);
    }
}
