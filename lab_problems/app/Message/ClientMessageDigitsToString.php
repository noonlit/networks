<?php
namespace Message;

use Util\FormatConverter;

class ClientMessageDigitsToString implements MessageComposerInterface
{
    /**
     * Returns a string representation of the given message, which is assumed to be numeric.
     *
     * @param string $message
     * @param string|null $ip
     * @param int|null $port
     * @return string
     */
    public function compose(string $message, string $ip = null, int $port = null): string
    {
        return FormatConverter::convertFourDigitsNumberToString((int) $message);
    }
}