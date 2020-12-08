<?php

namespace App;

class ContactNotFound extends \Exception 
{
    public function __construct()
    {
        parent::__construct("Contact not found", 404);
    }
}