<?php

namespace LTucillo;

use LTucillo\Helpers\Translate;
use LTucillo\Model\Admin;
use LTucillo\Model\Setup;

/**
 * Class LTucillo
 */
class App
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
    const ACTION_ADD = 'fixed_notices_add_action';
    /**
     *
     */
    const ACTION_REMOVE = 'fixed_notices_remove_action';
    /**
     * @var
     */
    static private $version;

    /**
     * @param $className
     */
    private function autoload($className)
    {
        if (!preg_match('/^' . self::PREFIX . '/', $className) || class_exists($className)) {
            return;
        }

        $file = __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
            . str_replace([self::PREFIX . '\\', '\\'], ['', DIRECTORY_SEPARATOR], $className)
            . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        spl_autoload_register([$this, 'autoload']);
        new Setup;
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
        $url = get_admin_url(null, 'users.php?page=' . App::SLUG . '-' . $action);

        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $url .= '&' . $k . '=' . $v;
            }
        }

        return $url;
    }

    /**
     * @param bool $base
     * @return array|string
     */
    static public function getPluginDir($base = true)
    {
        $dir = LTUCILLO_FIXED_NOTICES_DIR;
        return $base
            ? current(explode(DIRECTORY_SEPARATOR, trim(str_replace(WP_PLUGIN_DIR, '', $dir), DIRECTORY_SEPARATOR)))
            : $dir;
    }

    /**
     * @param bool $base
     * @return string
     */
    static public function getPluginFile($base = true)
    {
        $file  = 'ltucillo-fixed-notices.php';
        return $base
            ? $file
            : self::getPluginDir(false) . DIRECTORY_SEPARATOR . $file;
    }
}
