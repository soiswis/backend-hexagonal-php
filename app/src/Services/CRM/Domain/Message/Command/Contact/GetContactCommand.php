<?php
declare(strict_types=1);

namespace App\Services\CRM\Domain\Message\Command\Contact;

use App\Shared\Domain\Exception\InvalidCommandException;
use App\Shared\Domain\Message\Command\BaseCommand;

class GetContactCommand extends BaseCommand {

    /** @var int */
    private $id;

    /**
     * GetContactCommand constructor.
     *
     * @param null $data
     *
     * @throws InvalidCommandException
     */
    public function __construct($data = null)
    {
        $this->id = $data;
        parent::__construct($data);
    }

    /**
     * @return int|null
     */
    public function getContactId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     *
     * @throws InvalidCommandException
     */
    protected function isValid(): bool
    {
        if (!is_int($this->data)) {
            throw new InvalidCommandException("Contact ID must be integer!");
        }

        return true;
    }
}