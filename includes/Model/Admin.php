<?php

namespace LTucillo\Model;

use LTucillo\App;
use LTucillo\Controllers\NoticeCreateController;
use LTucillo\Controllers\NoticeListController;
use LTucillo\Controllers\NoticeRemoveController;
use LTucillo\Helpers\Translate;
use LTucillo\View\Admin\Notices\Form;
use LTucillo\View\Messages\ErrorMessage;
use LTucillo\View\Messages\SuccessMessage;
use LTucillo\View\UpdateMessages;

/**
 * Class Admin
 * @package LTucillo
 */
class Admin
{
    /**
     * Menu constructor.
     */
    public function init()
    {
        if (!session_id()) {
            session_start();
        }

        Translate::init();
        (new Update)->check();

        $notices = new Notices;
        $notices->renderTemporaryMessages();
        $notices->renderFixedMessages();

        // Wordpress native hook to add itens to menu
        add_action('admin_menu', [$this, 'addPages']);

        //wordpress native hook to trigger function on form submit
        add_action('admin_post_' . \LTucillo\App::ACTION_ADD, function () {
            new NoticeCreateController;
        });

        //wordpress native hook to trigger function on form submit
        add_action('admin_post_' . \LTucillo\App::ACTION_REMOVE, function () {
            new NoticeRemoveController;
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
            \LTucillo\App::SLUG . '-list',
            [new NoticeListController, 'execute']
        );

        add_users_page(
            Translate::__('Add Fixed Notice'),
            null,
            'edit_users',
            \LTucillo\App::SLUG . '-add',
            function () {
                echo new Form;
            }
        );
    }
}
