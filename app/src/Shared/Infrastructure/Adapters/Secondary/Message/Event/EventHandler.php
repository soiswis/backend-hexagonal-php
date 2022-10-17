<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Adapters\Secondary\Message\Event;

use App\Shared\Application\Ports\Primary\Message\Command\CommandBusInterface;
use App\Shared\Application\Ports\Secondary\Comms\MailerInterface;
use App\Shared\Domain\Message\MessageInterface;

class EventHandler implements EventHandlerInterface
{
    /** @var CommandBusInterface */
    private $commandBus;

    /** @var MailerInterface */
    private $mailer;

    /**
     * EventHandler constructor.
     *
     * @param CommandBusInterface $commandBus
     * @param MailerInterface $mailer
     */
    public function __construct(CommandBusInterface $commandBus, MailerInterface $mailer)
    {
        $this->commandBus = $commandBus;
        $this->mailer = $mailer;
    }

    /**
     * @param MessageInterface $event
     *
     * @return mixed
     */
    public function __invoke(MessageInterface $event)
    {
        $handlerClass = $this->getHandler($event);
        $handler = new $handlerClass($this->commandBus, $this->mailer);
        return $handler->handle($event);
    }

    /**
     * @param MessageInterface $event
     *
     * @return array|string|string[]
     */
    private function getHandler(MessageInterface $event)
    {
        $classPathAndName = explode('\\', get_class($event));

        $className = $classPathAndName[count($classPathAndName) - 1];
        $handlerName = str_replace('Event', 'Handler', $className);

        return str_replace(['\\Domain\\Message\\Event\\', $className], ['\\Application\\MessageHandler\\Event\\', $handlerName], get_class($event));
    }

    /**
     * TODO: With better "design" this could be removed! You know what I mean, I guess :)
     *
     * @param MessageInterface $message
     *
     * @return void
     */
    public function handle(MessageInterface $message): void
    {
        // This method is a placeholder only!
    }
}
