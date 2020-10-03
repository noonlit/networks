<?php

namespace TCP;

use \Message\MessageComposerInterface;

class Server
{
    /**
     * Maximum nr of bytes we accept in a received message.
     */
    const MAX_RECV_LEN = 100;

    /**
     * @var MessageComposerInterface
     */
    private $replyComposer;

    /**
     * @var MessageComposerInterface
     */
    private $outputComposer;
    /**
     * @var string
     */
    private $ip;
    /**
     * @var int
     */
    private $port;

    /**
     * Server constructor.
     * @param string $ip
     * @param int $port
     * @param MessageComposerInterface $replyComposer
     * @param MessageComposerInterface|null $outputComposer
     */
    public function __construct(MessageComposerInterface $replyComposer, MessageComposerInterface $outputComposer = null, string $ip = "0.0.0.0", int $port = 1025)
    {
        $this->replyComposer = $replyComposer;
        $this->outputComposer = $outputComposer;
        $this->ip = $ip;
        $this->port = $port;
    }

    /**
     * Receives a message from the client and responds and/or prints a message.
     */
    public function run() {
        $socket = socket_create(AF_INET,SOCK_STREAM,0);
        socket_bind($socket, $this->ip, $this->port);
        socket_listen($socket);
        $newSocket = socket_accept($socket);

        socket_recv($newSocket, $buffer, self::MAX_RECV_LEN, 0);
        $reply = $this->composeReply($buffer);
        socket_send($newSocket, $reply, strlen($reply), 0);

    }

    /**
     * Composes a reply for the client.
     *
     * @param string $message
     * @return string
     */
    private function composeReply(string $message) : string
    {
        return $this->replyComposer->compose($message);
    }
}