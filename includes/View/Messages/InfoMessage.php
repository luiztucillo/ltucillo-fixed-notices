<?php

namespace LTucillo\View\Messages;

use LTucillo\View\Message;

/**
 * Class InfoMessage
 * @package LTucillo\View\Messages
 */
class InfoMessage extends Message
{
    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'messages/info';
    }
}
