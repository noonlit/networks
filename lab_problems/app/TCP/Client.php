<?php

namespace TCP;

class Client
{
    /**
     * Maximum nr of bytes we accept in a received message.
     */
    const MAX_RECV_LEN = 100;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $serverIp;

    /**
     * @var int
     */
    private $serverPort;

    /**
     * Client constructor.
     * @param string $message
     * @param string $serverIp
     * @param int $serverPort
     */
    public function __construct(string $message, string $serverIp = "127.0.0.1", int $serverPort = 1025)
    {
        $this->message = $message;
        $this->serverIp = $serverIp;
        $this->serverPort = $serverPort;
    }

    /**
     * Sends a message to the server and prints acknowledgment.
     */
    public function run() {
        $socket = socket_create(AF_INET,SOCK_STREAM,0);
        socket_connect($socket, $this->serverIp, $this->serverPort);
        socket_send($socket, $this->message, strlen($this->message), 0);

        socket_recv($socket,$buffer,self::MAX_RECV_LEN,0);
        $this->printAcknowledgement($buffer);
    }

    /**
     * Prints the message received from the server.
     *
     * @param $buffer
     */
    private function printAcknowledgement($buffer) {
        echo "Received: {$buffer}";
    }
}