<?php

namespace LTucillo\Controllers;

use LTucillo\Entities\Notice;
use LTucillo\Helpers\Translate;
use LTucillo\Model\Notices;
use LTucillo\Repositories\NoticeRepository;

/**
 * Class NoticeCreateController
 * @package LTucillo\Controllers
 */
class NoticeCreateController
{
    /**
     * NoticeCreateController constructor.
     */
    public function __construct()
    {
        try {
            $group = $_POST['user-group'];

            foreach ($group as $k => $item) {
                $group[$k] = sanitize_text_field($item);
            }

            $notice = new Notice(
                $group,
                sanitize_text_field($_POST['notice-level']),
                sanitize_text_field(nl2br($_POST['message']))
            );

            NoticeRepository::save($notice);

            Notices::createSessionMessage(Notices::LEVEL_SUCCESS, Translate::__('Notice created successfully'));

            $url = \Ltucillo\App::getUrl('list');
        } catch (\Exception $e) {
            Notices::createSessionMessage(Notices::LEVEL_ERROR, Translate::__('Error creating notice'));
            $url = \Ltucillo\App::getUrl('list', ['add_error' => true]);
        }

        wp_redirect($url);

        return;
    }
}
