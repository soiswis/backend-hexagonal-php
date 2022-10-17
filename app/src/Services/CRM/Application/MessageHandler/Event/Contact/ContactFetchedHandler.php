<?php
declare(strict_types=1);

namespace App\Services\CRM\Application\MessageHandler\Event\Contact;

use App\Shared\Application\Ports\Primary\Message\Command\CommandBusInterface;
use App\Shared\Application\Ports\Secondary\Comms\MailerInterface;
use App\Shared\Domain\Exception\InvalidEventException;
use App\Shared\Domain\Message\MessageHandlerInterface;
use App\Shared\Domain\Message\MessageInterface;

class ContactFetchedHandler implements MessageHandlerInterface {

    /** @var CommandBusInterface */
    private $commandBus;

    /** @var MailerInterface */
    private $mailer;

    /**
     * ContactFetchedHandler constructor.
     *
     * @param CommandBusInterface $commandBus
     * @param MailerInterface $mailer
     */
    public function __construct(CommandBusInterface $commandBus, MailerInterface $mailer)
    {
        // $commandBus can be used here to fire other commands if need be
        $this->commandBus = $commandBus;
        $this->mailer = $mailer;
    }

    /**
     * @param MessageInterface $message
     * @return string|null
     *
     * @throws InvalidEventException
     */
    public function handle(MessageInterface $message): ?string
    {
        $contact = $message->getContact();

        $this->mailer->send([
            'id' => $contact->getId(),
            'subject' => 'Hi contact ' . $contact->getName()
        ]);

        return null;
    }
}