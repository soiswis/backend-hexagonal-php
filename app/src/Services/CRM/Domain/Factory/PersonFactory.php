<?php
declare(strict_types=1);

namespace App\Services\CRM\Domain\Factory;

use App\Services\CRM\Domain\Model\Contact;
use App\Services\CRM\Domain\Model\Person;

class PersonFactory
{
    /**
     * @param string       $firstName
     * @param string       $lastName
     * @param Contact|null $contact
     *
     * @return Person
     */
    public function createPerson(string $firstName, string $lastName, Contact $contact): Person
    {
        return new Person($firstName, $lastName, $contact);
    }
}