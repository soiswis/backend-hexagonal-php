<?php
require '../vendor/autoload.php';

use App\Shared\Infrastructure\Adapters\Primary\Message\Command\CommandBus;
use App\Shared\Domain\Message\MessageBusInterface;
use App\Services\CRM\Domain\Message\Command\Contact\GetContactCommand;

header('Content-Type: application/json');

echo executeCommand(new CommandBus());

function executeCommand(MessageBusInterface $commandBus)
{
    try {
        $command = new GetContactCommand(29);
        $res = $commandBus->dispatch($command);

        return json_encode([
            'msg' => $res . ' An email was sent',
        ]);
    } catch (\Exception $ex) {
        return json_encode([
            'error' => $ex->getMessage(),
        ]);
    }
}