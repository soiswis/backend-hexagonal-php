<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Adapters\Secondary\Storage\Repository;

use App\Services\CRM\Domain\Model\Contact;
use App\Shared\Application\Ports\Secondary\Storage\Repository\BaseRepository;
use App\Shared\Domain\Exception\InvalidQueryException;
use App\Shared\Domain\Model\BaseModel;

class RepositoryAdapter implements BaseRepository {

    /** @var array */
    private $contacts = [
        '29' => [
            'name' => 'John Doe'
        ]
    ];

    /**
     * @param BaseModel $baseModel
     * @param array $data
     *
     * @return void
     */
    public function save(BaseModel $baseModel, array $data): void
    {
        // TODO implement save
    }

    /**
     * @param int $id
     * @return Contact
     * @throws InvalidQueryException
     */
    public function getById(int $id): Contact
    {
        // TODO - transform to domain object "DTO"

        if (!isset($this->contacts[$id])) {
            throw new InvalidQueryException('Does not exist!');
        }

        $contact = new Contact($id);
        $contact->setName($this->contacts[$id]['name']);

        return $contact;
    }
}