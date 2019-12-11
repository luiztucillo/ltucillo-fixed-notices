<?php

namespace LTucillo\View\Messages;

use LTucillo\View\Message;

/**
 * Class SuccessMessage
 * @package LTucillo\View\Messages
 */
class SuccessMessage extends Message
{
    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'messages/success';
    }
}
