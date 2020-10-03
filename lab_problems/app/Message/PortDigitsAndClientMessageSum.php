<?php
namespace Message;

use Util\Math;

class PortDigitsAndClientMessageSum implements MessageComposerInterface
{
    /**
     * Calculates the sum of the port's digits, adds it to the message, returns the result.
     *
     * @param string $message
     * @param string|null $ip
     * @param int|null $port
     * @return string
     */
    public function compose(string $message, string $ip = null, int $port = null): string
    {
        if ($ip == null || $port == null) {
            return 0;
        }

        return Math::calculateSumOfDigits($port) + (int) $message;
    }
}