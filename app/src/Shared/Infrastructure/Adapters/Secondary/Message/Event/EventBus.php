<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Adapters\Secondary\Message\Event;

use App\Shared\Application\Ports\Secondary\Message\Event\EventBusInterface;
use App\Shared\Domain\Message\MessageInterface;
use App\Shared\Infrastructure\Adapters\Primary\Message\Command\CommandBus;
use App\Shared\Infrastructure\Adapters\Secondary\Comms\MailerAdapter;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus as MessengerMessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class EventBus implements EventBusInterface
{
    /**
     * @param MessageInterface $message
     *
     * @return mixed
     */
    public function dispatch(MessageInterface $message)
    {
        $handler = new EventHandler(new CommandBus(), new MailerAdapter());

        $bus = new MessengerMessageBus([
            new HandleMessageMiddleware(new HandlersLocator([
                get_class($message) => [$handler],
            ])),
        ]);

        $envelope = $bus->dispatch($message);

        $handledStamp = $envelope->last(HandledStamp::class);

        return $handledStamp->getResult();
    }
}
