<?php

namespace LTucillo\Model;

use LTucillo\Controllers\NoticeCreateController;
use LTucillo\Controllers\NoticeListController;
use LTucillo\Controllers\NoticeRemoveController;
use LTucillo\Helpers\Translate;
use LTucillo\View\Admin\Notices\Form;
use LTucillo\View\Messages\ErrorMessage;
use LTucillo\View\Messages\SuccessMessage;

/**
 * Class Admin
 * @package LTucillo
 */
class Admin
{
    /**
     * Menu constructor.
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addPages']);

        add_action('admin_post_' . \LTucilloApp::ACTION_ADD, function() {
            new NoticeCreateController;
        });

        add_action('admin_post_' . \LTucilloApp::ACTION_REMOVE, function() {
            new NoticeRemoveController;
        });

        add_action('init', function() {

            if (!session_id()) {
                session_start();
            }

            $notices = new Notices;
            $notices->renderTemporaryMessages();
            $notices->renderFixedMessages();
        });
    }

    /**
     *
     */
    public function addPages()
    {
        add_users_page(
            Translate::__('Fixed Notices'),
            Translate::__('Fixed Notices'),
            'edit_users',
            \LTucilloApp::SLUG . '-list',
            [new NoticeListController, 'execute']
        );

        add_users_page(
            Translate::__('Fixed Notices Add'),
            null,
            'edit_users',
            \LTucilloApp::SLUG . '-add',
            function () {
                echo new Form;
            }
        );
    }
}
