<?php

use LTucillo\Model\Admin;
use LTucillo\Model\Setup;

/**
 * Class LTucillo
 */
class LTucilloApp
{
    /**
     *
     */
    const PREFIX = 'LTucillo';
    /**
     *
     */
    const SLUG = 'fixed-notices';
    /**
     *
     */
    const ACTION_ADD    = 'fixed_notices_add_action';
    /**
     *
     */
    const ACTION_REMOVE = 'fixed_notices_remove_action';
    /**
     * @var
     */
    static private $version;

    /**
     * App constructor.
     */
    public function __construct()
    {
        try {
            spl_autoload_register([$this, 'autoload']);
        } catch (Exception $e) {
            return false;
        }

        $this->init();
    }

    /**
     * @param $className
     */
    private function autoload($className)
    {
        if (!preg_match('/^' . self::PREFIX . '/', $className) || class_exists($className)) {
            return;
        }

        $file = __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR
            . str_replace([self::PREFIX . '\\', '\\'], ['', DIRECTORY_SEPARATOR], $className)
            . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }

    private function init()
    {
        new Setup;
        new Admin;
    }

    /**
     * @return mixed
     */
    static public function version()
    {
        if (is_null(self::$version)) {
            try {
                $file = __DIR__ . '/ltucillo-notices.php';

                if (file_exists($file)) {
                    if (preg_match('/\*[\s\t]+?version:[\s\t]+?([0-9.]+)/i', file_get_contents($file), $v)) {
                        self::$version = $v[1];
                    }
                }
            } catch (Exception $e) {
                return '0';
            }
        }

        return self::$version;
    }

    /**
     * @param $action
     * @param array $params
     * @return string
     */
    static public function getUrl($action, $params = [])
    {
        $url = get_admin_url(null, 'users.php?page=' . \LTucilloApp::SLUG . '-' . $action);

        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $url .= '&' . $k . '=' . $v;
            }
        }

        return $url;
    }
}
