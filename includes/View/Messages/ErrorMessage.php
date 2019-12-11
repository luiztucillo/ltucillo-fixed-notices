<?php

namespace LTucillo\View\Messages;

use LTucillo\View\Message;

/**
 * Class ErrorMessage
 * @package LTucillo\View\Messages
 */
class ErrorMessage extends Message
{
    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'messages/error';
    }
}
