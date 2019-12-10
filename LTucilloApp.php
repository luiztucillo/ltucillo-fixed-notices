<?php

use LTucillo\Model\Admin;

/**
 * Class LTucillo
 */
class LTucilloApp
{
    const PREFIX = 'LTucillo';
    const SLUG = 'fixed-notices';

    /**
     * App constructor.
     */
    public function __construct()
    {
        try {
            spl_autoload_register([$this, 'autoload']);
        } catch (\Exception $e) {
            return false;
        }

        $this->init();
    }

    /**
     * @param $className
     */
    private function autoload($className)
    {
        if (!preg_match('/^'.self::PREFIX.'/', $className) || class_exists($className)) {
            return;
        }

        $file = __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR
            . str_replace([self::PREFIX . '\\', '\\'], ['', DIRECTORY_SEPARATOR], $className)
            . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }

    /**
     *
     */
    private function init()
    {
        new Admin;
    }
}
