<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Adapters\Primary\Message\Command;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface as MessengerMessageHandlerInterface;
use App\Shared\Domain\Message\MessageHandlerInterface as DomainCommandHandlerInterface;

/**
 * Marker interface.
 * TODO: There are better ways than using a marker interface in this particular use-case but hey!
 */
interface CommandHandlerInterface extends MessengerMessageHandlerInterface, DomainCommandHandlerInterface
{

}
