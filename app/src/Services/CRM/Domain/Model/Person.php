<?php
declare(strict_types=1);

namespace App\Services\CRM\Domain\Model;

use App\Shared\Domain\Model\BaseModel;

class Person implements BaseModel {

    /** @var string */
    protected $id;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $lastName;

    /** @var Contact */
    protected $contact;

    /**
     * User constructor.
     *
     * @param string       $firstName
     * @param string       $lastName
     * @param Contact|null $contact
     */
    public function __construct(
        string $firstName,
        string $lastName,
        Contact $contact
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->id       = md5(json_encode([$firstName, $lastName]));
        $this->contact  = $contact;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}