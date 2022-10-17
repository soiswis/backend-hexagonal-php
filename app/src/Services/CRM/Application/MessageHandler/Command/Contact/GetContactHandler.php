<?php
declare(strict_types=1);

namespace App\Services\CRM\Application\MessageHandler\Command\Contact;

use App\Services\CRM\Domain\Message\Event\Contact\ContactFetchedEvent;
use App\Services\CRM\Domain\Model\Contact;
use App\Shared\Application\Ports\Secondary\Message\Event\EventBusInterface;
use App\Shared\Application\Ports\Secondary\Storage\Repository\BaseRepository;
use App\Shared\Domain\Exception\InvalidCommandException;
use App\Shared\Domain\Message\MessageHandlerInterface;
use App\Shared\Domain\Message\MessageInterface;

class GetContactHandler implements MessageHandlerInterface {

    /** @var EventBusInterface */
    private $eventBus;

    /** @var BaseRepository */
    private $repository;

    /**
     * GetContactHandler constructor.
     *
     * @param EventBusInterface $eventBus
     * @param BaseRepository $repository
     */
    public function __construct(EventBusInterface $eventBus, BaseRepository $repository)
    {
        $this->eventBus = $eventBus;
        $this->repository = $repository;
    }

    /**
     * @param MessageInterface $message
     *
     * @return string
     * @throws InvalidCommandException
     */
    public function handle(MessageInterface $message): string
    {
        $contact = $this->repository->getById($message->getContactId());

        if (!$contact instanceof Contact) {
            throw new InvalidCommandException('Could not retrieve Contact!');
        }

        $this->eventBus->dispatch(new ContactFetchedEvent($contact));
        return 'It\'s working :) This is the result of GetContactHandler - Contact: ' . $contact->getName();
    }
}