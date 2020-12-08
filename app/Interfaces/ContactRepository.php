<?php

namespace App\Interfaces;

use App\Contact;

interface ContactRepository
{
    public function findByName(string $name): Contact;
}
