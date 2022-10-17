<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Adapters\Primary\Message\Command;

use App\Shared\Application\Ports\Primary\Message\Command\CommandBusInterface;
use App\Shared\Domain\Message\MessageInterface;
use App\Shared\Infrastructure\Adapters\Secondary\Message\Event\EventBus;
use App\Shared\Infrastructure\Adapters\Secondary\Storage\Repository\RepositoryAdapter;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus as MessengerMessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class CommandBus implements CommandBusInterface
{
    /**
     * @param MessageInterface $message
     *
     * @return mixed
     */
    public function dispatch(MessageInterface $message)
    {
        $handler = new CommandHandler(new EventBus(), new RepositoryAdapter());

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
