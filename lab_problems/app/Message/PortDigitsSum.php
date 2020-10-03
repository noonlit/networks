<?php
namespace Message;

use Util\Math;

class PortDigitsSum implements MessageComposerInterface
{
    /**
     * Returns the sum of the port's digits.
     *
     * @param string $message
     * @param string|null $ip
     * @param int|null $port
     * @return string
     */
    public function compose(string $message, string $ip = null, int $port = null): string
    {
        if ($port == null) {
            return 0;
        }

        return Math::calculateSumOfDigits($port);
    }
}