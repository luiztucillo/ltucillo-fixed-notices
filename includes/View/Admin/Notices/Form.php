<?php

namespace LTucillo\View\Admin\Notices;

use LTucillo\Model\HtmlOption;
use LTucillo\View\Template;

/**
 * Class AddForm
 * @package LTucillo\View\Admin
 */
class Form extends Template
{
    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'notices/form';
    }

    protected function getBackUrl()
    {
        return \App::getUrl('list');
    }

    /**
     * @return string
     */
    protected function getFormAction()
    {
        return get_admin_url(null, 'admin-post.php');
    }

    /**
     * @return array
     */
    protected function getRoles()
    {
        global $wp_roles;
        $return = [];

        foreach ($wp_roles->roles as $k => $role) {
            $return[] = new HtmlOption($k, $role['name']);
        }

        return $return;
    }
}
