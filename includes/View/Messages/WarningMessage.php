<?php

namespace LTucillo\View\Messages;

use LTucillo\View\Message;

/**
 * Class WarningMessage
 * @package LTucillo\View\Messages
 */
class WarningMessage extends Message
{
    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'messages/warning';
    }
}
