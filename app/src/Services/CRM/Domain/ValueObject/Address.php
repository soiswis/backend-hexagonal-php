<?php
declare(strict_types=1);

namespace App\Services\CRM\Domain\ValueObject;

final class Address
{
    /** @var string */
    private $addressLine1;

    /** @var Postcode */
    private $postcode;

    /**
     * Address constructor.
     *
     * @param string $addressLine1
     * @param Postcode $postcode
     *
     * @throws \Exception
     */
    private function __construct(string $addressLine1, Postcode $postcode)
    {
        if (empty($addressLine1)) {
            throw new \Exception('Address line 1 is missing!');
        }

        $this->addressLine1 = $addressLine1;
        $this->postcode = $postcode;
    }

    /**
     * @param string $addressLine1
     * @param Postcode $postcode
     *
     * @return static
     * @throws \Exception
     */
    public static function create(string $addressLine1, Postcode $postcode): self
    {
        return new self($addressLine1, $postcode);
    }

    /**
     * @return string
     */
    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    /**
     * @return Postcode
     */
    public function getPostcode(): Postcode
    {
        return $this->postcode;
    }
}