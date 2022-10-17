<?php
declare(strict_types=1);

namespace App\Services\CRM\Domain\ValueObject;

final class Postcode
{
    /** @var string */
    private $postcode;

    /**
     * Postcode constructor.
     *
     * @param string $postcode
     * @throws \Exception
     */
    private function __construct(string $postcode)
    {
        if (empty($postcode)) {
            throw new \Exception('Postcode is missing!');
        }

        $this->postcode = $postcode;
    }

    /**
     * @param string $postcode
     *
     * @return static
     * @throws \Exception
     */
    public static function create(string $postcode): self
    {
        return new self($postcode);
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }
}