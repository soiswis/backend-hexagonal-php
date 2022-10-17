<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Adapters\Secondary\Message\Event;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface as MessengerMessageHandlerInterface;
use App\Shared\Domain\Message\MessageHandlerInterface as DomainCommandHandlerInterface;

/**
 * Marker interface.
 * TODO: There are better ways than using a marker interface in this particular use-case but hey!
 */
interface EventHandlerInterface extends MessengerMessageHandlerInterface, DomainCommandHandlerInterface
{

}
