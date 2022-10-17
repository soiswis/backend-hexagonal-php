<?php
declare(strict_types=1);

namespace App\Services\CRM\Domain\Model;

use App\Shared\Domain\Model\BaseModel;

class Contact implements BaseModel {

    /** @var int */
    private $id;

    /** @var string */
    private $name;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}