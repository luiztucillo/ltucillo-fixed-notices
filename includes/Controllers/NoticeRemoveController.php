<?php

namespace LTucillo\Controllers;

use LTucillo\Helpers\Translate;
use LTucillo\Model\Notices;
use LTucillo\Repositories\NoticeRepository;

/**
 * Class NoticeRemoveController
 * @package LTucillo\Controllers
 */
class NoticeRemoveController
{
    /**
     * NoticeRemoveController constructor.
     */
    public function __construct()
    {
        $noticeId = sanitize_key($_GET['notice']);
        $notice = NoticeRepository::load($noticeId);

        if (!$notice) {
            Notices::createSessionMessage(Notices::LEVEL_ERROR, Translate::__('Error removing notice'));
            wp_redirect(\Ltucillo\App::getUrl('list'));
            return;
        }

        NoticeRepository::delete($notice);

        Notices::createSessionMessage(Notices::LEVEL_SUCCESS, Translate::__('Notice removed successfully'));

        wp_redirect(\Ltucillo\App::getUrl('list'));
    }
}
