<?php

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
    public function __construct(MessageComposerInterface $replyComposer, MessageComposerInterface $outputComposer = null, string $ip = "127.0.0.1", int $port = 1025)
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
        $socketResource = socket_create(AF_INET,SOCK_DGRAM,0);
        socket_bind($socketResource, $this->ip, $this->port);

        while (true) {
            socket_recvfrom($socketResource, $buffer, self::MAX_RECV_LEN, 0, $clientIp, $clientPort);

            // print required output, if any
            $this->printOutput($buffer, $clientIp, $clientPort);

            // send response
            $response = $this->composeReply($buffer, $clientIp, $clientPort);
            socket_sendto($socketResource, $response, strlen($response), 0, $clientIp, $clientPort);
        }
    }

    /**
     * Composes reply to send to client.
     *
     * @param string $message
     * @param string $clientIp
     * @param int $clientPort
     * @return string
     */
    private function composeReply(string $message, string $clientIp, int $clientPort) : string
    {
        return $this->replyComposer->compose($message, $clientIp, $clientPort);
    }

    /**
     * Composes output to print to server console.
     *
     * @param string $message
     * @param string $clientIp
     * @param int $clientPort
     * @return string
     */
    private function composeOutput(string $message, string $clientIp, int $clientPort) : string
    {
        if (is_null($this->outputComposer)) {
            return "";
        }

        return $this->outputComposer->compose($message, $clientIp, $clientPort);
    }

    /**
     * Prints the message composed by the given output composer.
     *
     * @param string $buffer
     * @param string $clientIp
     * @param int $clientPort
     */
    private function printOutput(string $buffer, string $clientIp, int $clientPort) : void
    {
        $output = $this->composeOutput($buffer, $clientIp, $clientPort);

        if (empty($output)) {
            return;
        }

        echo $output;
    }
}