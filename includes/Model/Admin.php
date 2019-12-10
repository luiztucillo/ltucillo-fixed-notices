<?php

namespace LTucillo\Model;

use LTucillo\View\Admin\Config;

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
    }

    public function addPages()
    {
        add_users_page(
            'Fixed Notices',
            'Fixed Notices',
            'edit_users',
            \LTucilloApp::SLUG . '-list',
            function() {
                echo new Config();
            }
        );

        add_users_page(
            'Fixed Notices Add',
            null,
            'edit_users',
            \LTucilloApp::SLUG . '-add',
            function() {
                echo 'Novo';
            }
        );
    }
}
