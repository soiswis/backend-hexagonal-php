<?php
declare(strict_types=1);

namespace App\Services\CRM\Application\Ports\Storage\Repository;

use App\Services\CRM\Domain\Model\Contact;

interface ContactRepository {
    /**
     * @param Contact $baseModel
     * @param array $data
     *
     * @return Contact
     */
    public function save(Contact $baseModel, array $data) : Contact;

    /**
     * @param Contact $baseModel
     *
     * @return Contact
     */
    public function get(Contact $baseModel) : Contact;
}