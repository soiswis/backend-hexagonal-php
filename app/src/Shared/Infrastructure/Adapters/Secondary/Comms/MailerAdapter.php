<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Adapters\Secondary\Comms;

use App\Shared\Application\Ports\Secondary\Comms\MailerInterface;

class MailerAdapter implements MailerInterface {
    /**
     * @param array $data
     *
     * @return void
     */
    public function send(array $data): void
    {
        $contactId = $data['id'];
        $to      = 'soiswis@gmail.com';
        $subject = $data['subject'];
        $message = 'Hexagonal Architecture is beautiful :)';
        $headers = 'From: soiswis@hotmail.com'       . "\r\n" .
            'Reply-To: soiswis@hotmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        file_put_contents("email-sent-to-{$contactId}.json", json_encode([$to, $subject, $message, $headers]));
        // mail($to, $subject, $message, $headers);
    }
}