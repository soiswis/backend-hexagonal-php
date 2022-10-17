<?php
declare(strict_types=1);

namespace App\Services\CRM\Domain\Message\Event\Contact;

use App\Services\CRM\Domain\Model\Contact;
use App\Shared\Domain\Message\Event\BaseEvent;

class ContactFetchedEvent extends BaseEvent {

    /** @var Contact */
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}