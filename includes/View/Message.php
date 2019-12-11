<?php

namespace LTucillo\View;

/**
 * Class Message
 * @package LTucillo\View
 */
abstract class Message extends Template
{
    /**
     * @var
     */
    protected $message;

    /**
     * Message constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    protected function getMessage()
    {
        return $this->message;
    }
}
