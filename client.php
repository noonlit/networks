<?php
// create UDP socket
$socketResource = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

// send 3 bytes from buffer content to server
// use any port > 1024
socket_sendto($socketResource,"msg", 3, 0, "127.0.0.1", 1025);

socket_recvfrom($socketResource, $buffer, 10, 0, $serverIp, $serverPort);
echo "Received: {$buffer} from IP = {$serverIp}:{$serverPort}";
