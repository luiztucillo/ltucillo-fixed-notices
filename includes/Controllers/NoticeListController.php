<?php

namespace LTucillo\Controllers;

use LTucillo\View\Admin\Notices;
use LTucillo\View\Messages\ErrorMessage;
use LTucillo\View\Messages\SuccessMessage;

/**
 * Class NoticeListController
 * @package LTucillo\Controllers
 */
class NoticeListController
{
    /**
     *
     */
    public function execute()
    {
        echo new Notices;
    }
}
