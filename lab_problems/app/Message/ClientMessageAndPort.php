<?php
namespace Message;

class ClientMessageAndPort implements MessageComposerInterface
{
    public function compose(string $message, string $ip = null, int $port = null): string
    {
        return "Message is {$message} and port is {$port}";
    }
}