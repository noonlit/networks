<?php

namespace Message;

use Util\Math;

class IpNumbersSum implements MessageComposerInterface
{
    /**
     * Returns the sum of the IP's digits.
     *
     * @param string $message
     * @param string|null $ip
     * @param int|null $port
     * @return string
     */
    public function compose(string $message, string $ip = null, int $port = null): string
    {
        if ($ip == null) {
            return "";
        }

        $ip = str_replace(".", "", $ip);
        return Math::calculateSumOfDigits((int) $ip);
    }
}
