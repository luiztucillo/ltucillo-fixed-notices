<?php

namespace LTucillo\View\Admin;

use LTucillo\Repositories\NoticeRepository;
use LTucillo\View\Admin\Notices\Grid;
use LTucillo\View\Template;

/**
 * Class Config
 * @package LTucillo\View\Admin
 */
class Notices extends Template
{
    /**
     * @var
     */
    protected $notices;

    /**
     * Notices constructor.
     */
    public function __construct()
    {
        $this->notices = NoticeRepository::all();
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'notices/list';
    }

    /**
     * @return string
     */
    protected function getAddUrl()
    {
        return \LTucillo\App::getUrl('add');
    }

    /**
     * @return array
     */
    protected function getNotices()
    {
        return $this->notices;
    }

    /**
     * @return bool
     */
    protected function hasNotices()
    {
        return count($this->getNotices()) > 0;
    }

    /**
     * @return Grid
     */
    protected function renderNoticeList()
    {
        return new Grid($this->getNotices());
    }
}
