<?php

namespace LTucillo\View\Admin\Notices;

use LTucillo\Entities\Notice;
use LTucillo\View\Template;

/**
 * Class Grid
 * @package LTucillo\View\Admin\Notices
 */
class Grid extends Template
{
    /**
     * @var array
     */
    private $notices = [];

    /**
     * Grid constructor.
     * @param array $notices
     */
    public function __construct(array $notices)
    {
        $this->notices = $notices;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'notices/grid';
    }

    /**
     * @return array
     */
    protected function getNotices()
    {
        return $this->notices;
    }

    /**
     * @param Notice $notice
     * @return string|void
     */
    protected function getRemoveUrl(Notice $notice)
    {
        $url = get_admin_url(null, 'admin-post.php')
            . '?action=' . \LTucilloApp::ACTION_REMOVE . '&notice=' . $notice->getId();

        return esc_url($url);
    }
}
