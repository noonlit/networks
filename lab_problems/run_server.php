<?php
require __DIR__ . '/autoload.php';

use Message\ClientMessageDigitsToString;
use Message\IpNumbersSum;
use Message\PortDigitsAndClientMessageSum;
use Message\PortDigitsSum;
use Message\ClientMessageAndPort;
use UDP\Server as UDPServer;
use TCP\Server as TCPServer;


/**
 * Problem 1.
 *
 * "Clientul trimite serverului un sir de caractere (de exemplu numele utilizatorului citit de la tastatura).
 * Serverul afiseaza pe ecran sirul primit si portul clientului si ii raspunde acestuia cu suma cifrelor din Portul clientului.
 * Clientul va afisa pe ecran numarul primit."
 */
//$server = new UDPServer(new PortDigitsSum(), new ClientMessageAndPort());
//$server->run();

/**
 * Problem 2.
 *
 * "Intoarce suma cifrelor din Portul serverului adunate cu un numar primt de la client."
 */
//$server = new UDPServer(new PortDigitsAndClientMessageSum());
//$server->run();

/**
 * Problem 3.
 *
 * Intoarce suma cifrelor din IP-ul clientului.
 */
//$server = new UDPServer(new IpNumbersSum());
//$server->run();

/**
 * Problem 4.
 *
 * Transforma o cifra in cuvinte [1234-Una mii doua sute trei zeci si patru] (max 4 cifre)
 */
//$server = new UDPServer(new ClientMessageDigitsToString());
//$server->run();

/**
 * Problem 4, TCP version.
 *
 * Transforma o cifra in cuvinte [1234-Una mii doua sute trei zeci si patru] (max 4 cifre)
 */
$server = new TCPServer(new ClientMessageDigitsToString());
$server->run();