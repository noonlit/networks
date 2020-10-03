<?php
require __DIR__ . '/autoload.php';

use UDP\Client as UDPClient;
use TCP\Client as TCPClient;

/**
 * Problem 1.
 *
 * "Clientul trimite serverului un sir de caractere.
 * Serverul afiseaza pe ecran sirul primit si portul clientului si ii raspunde acestuia cu suma cifrelor din Portul clientului.
 * Clientul va afisa pe ecran numarul primit."
 */
//$UDPClient = new UDPClient("This is a message");
//$UDPClient->run();

/**
 * Problem 2.
 *
 * "Intoarce suma cifrelor din Portul serverului adunate cu un numar primit de la client."
 */
//$UDPClient = new UDPClient("10");
//$UDPClient->run();

/**
 * Problem 3.
 *
 * Intoarce suma cifrelor din IP-ul clientului.
 */
//$UDPClient = new UDPClient("");
//$UDPClient->run();

/**
 * Problem 4.
 *
 * Transforma o cifra in cuvinte [1234-Una mii doua sute trei zeci si patru] (max 4 cifre)
 */
//$UDPClient = new UDPClient("1234");
////$UDPClient->run();

/**
 * Problem 4, TCP version
 *
 * Transforma o cifra in cuvinte [1234-Una mii doua sute trei zeci si patru] (max 4 cifre)
 */
$TCPClient = new TCPClient("3456");
$TCPClient->run();