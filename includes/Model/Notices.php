<?php

namespace LTucillo\Model;

use LTucillo\Entities\Notice;
use LTucillo\Repositories\NoticeRepository;
use LTucillo\View\Messages\ErrorMessage;
use LTucillo\View\Messages\InfoMessage;
use LTucillo\View\Messages\SuccessMessage;
use LTucillo\View\Messages\WarningMessage;

class Notices
{
    const LEVEL_ERROR = 'error';
    const LEVEL_WARNING = 'warning';
    const LEVEL_SUCCESS = 'success';
    const LEVEL_INFO = 'info';

    /**
     * @param $level
     * @param $message
     */
    static public function createSessionMessage($level, $message)
    {
        $_SESSION[\LTucillo\App::SLUG][$level][] = $message;
    }

    /**
     * Notices constructor.
     */
    public function renderFixedMessages()
    {
        $user = wp_get_current_user();
        $role = current((array)$user->roles);

        /** @var Notice $notice */
        foreach (NoticeRepository::byUserGroup($role) as $notice) {
            $this->showMessage($notice->getLevel(), $notice->getMessage());
        }
    }

    /**
     *
     */
    public function renderTemporaryMessages()
    {
        $messages = $_SESSION[\LTucillo\App::SLUG];
        unset($_SESSION[\LTucillo\App::SLUG]);

        if (!$messages) {
            return;
        }

        foreach ($messages as $level => $message) {
            foreach ($message as $msg) {
                $this->showMessage($level, $msg);
            }
        }
    }

    /**
     * @param $level
     * @param $message
     */
    private function showMessage($level, $message)
    {
        $message = nl2br($message);

        switch ($level) {
            case self::LEVEL_WARNING:
                add_action('admin_notices', [new WarningMessage($message), 'render']);
                break;
            case self::LEVEL_ERROR:
                add_action('admin_notices', [new ErrorMessage($message), 'render']);
                break;
            case self::LEVEL_SUCCESS:
                add_action('admin_notices', [new SuccessMessage($message), 'render']);
                break;
            case self::LEVEL_INFO:
                add_action('admin_notices', [new InfoMessage($message), 'render']);
                break;
        }
    }
}
