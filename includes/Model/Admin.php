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

        add_action('admin_post_' . \App::ACTION_ADD, function() {
            new NoticeCreateController;
        });

        add_action('admin_post_' . \App::ACTION_REMOVE, function() {
            new NoticeRemoveController;
        });

        add_action('init', function() {

            if (!session_id()) {
                session_start();
            }

            Translate::init();

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
            \App::SLUG . '-list',
            [new NoticeListController, 'execute']
        );

        add_users_page(
            Translate::__('Add Fixed Notice'),
            null,
            'edit_users',
            \App::SLUG . '-add',
            function () {
                echo new Form;
            }
        );
    }
}
