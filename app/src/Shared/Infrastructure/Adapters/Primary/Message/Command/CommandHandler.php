<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Adapters\Primary\Message\Command;

use App\Shared\Application\Ports\Secondary\Message\Event\EventBusInterface;
use App\Shared\Domain\Message\MessageInterface;
use App\Shared\Infrastructure\Adapters\Secondary\Storage\Repository\RepositoryAdapter;

class CommandHandler implements CommandHandlerInterface
{
    /** @var EventBusInterface */
    private $eventBus;

    /** @var RepositoryAdapter */
    private $repositoryAdapter;

    /**
     * CommandHandler constructor.
     *
     * @param EventBusInterface $eventBus
     * @param RepositoryAdapter $repositoryAdapter
     */
    public function __construct(EventBusInterface $eventBus, RepositoryAdapter $repositoryAdapter)
    {
        $this->eventBus = $eventBus;
        $this->repositoryAdapter = $repositoryAdapter;
    }

    /**
     * @param MessageInterface $command
     *
     * @return mixed
     */
    public function __invoke(MessageInterface $command)
    {
        $handlerClass = $this->getHandler($command);
        $handler = new $handlerClass($this->eventBus, $this->repositoryAdapter);
        return $handler->handle($command);
    }

    /**
     * @param MessageInterface $command
     *
     * @return array|string|string[]
     */
    private function getHandler(MessageInterface $command)
    {
        $classPathAndName = explode('\\', get_class($command));

        $className = $classPathAndName[count($classPathAndName) - 1];
        $handlerName = str_replace('Command', 'Handler', $className);

        return str_replace(['\\Domain\\Message\\Command\\', $className], ['\\Application\\MessageHandler\\Command\\', $handlerName], get_class($command));
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
