<?php

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
        $socketResource = socket_create(AF_INET,SOCK_DGRAM,SOL_UDP);
        socket_sendto($socketResource, $this->message, strlen($this->message),0, $this->serverIp, $this->serverPort);

        socket_recvfrom($socketResource,$buffer,self::MAX_RECV_LEN,0,$serverIp,$serverPort);
        $this->printAcknowledgement($buffer, $serverIp, $serverPort);
    }

    /**
     * Prints acknowledgment.
     *
     * @param $buffer
     * @param $serverIp
     * @param $serverPort
     */
    private function printAcknowledgement($buffer, $serverIp, $serverPort) {
        echo "Received: {$buffer} from IP = {$serverIp}:{$serverPort}";
    }
}