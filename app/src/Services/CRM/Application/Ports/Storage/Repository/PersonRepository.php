<?php
declare(strict_types=1);

namespace App\Services\CRM\Application\Ports\Storage\Repository;

use App\Services\CRM\Domain\Model\Person;

interface PersonRepository {
    /**
     * @param Person $baseModel
     * @param array $data
     * 
     * @return Person
     */
    public function save(Person $baseModel, array $data) : Person;

    /**
     * @param Person $baseModel
     * 
     * @return Person
     */
    public function get(Person $baseModel) : Person;
}