<?php
namespace Message;

/**
 * Interface MessageComposerInterface
 *
 * Implemented by all classes used by Servers to respond to a Client message.
 */
interface MessageComposerInterface {
    public function compose(string $message, string $ip = null, int $port = null) : string;
}