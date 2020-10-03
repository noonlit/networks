<?php
// create UDP socket (endpoint for configuration)
$socketResource = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

// bind on all interfaces on port 1025
// if port is not specified, it will be random
socket_bind($socketResource, '127.0.0.1', 1025);

// read max 10 bytes from $socket into $buffer
socket_recvfrom($socketResource, $buffer, 10, 0, $clientIp, $clientPort);
echo "Received: {$buffer} from IP = {$clientIp}:{$clientPort}";
socket_sendto($socketResource, "hello", 5, 0, $clientIp, $clientPort);
