<?php

namespace LTucillo\Helpers;

/**
 * Class Translate
 * @package LTucillo\Helpers
 */
class Translate
{
    const TEXT_DOMAIN = 'ltucillo-fixed-notices';

    static public function init()
    {
        $dir = explode(DIRECTORY_SEPARATOR, trim(str_replace(WP_PLUGIN_DIR, '', __DIR__), DIRECTORY_SEPARATOR));
        load_plugin_textdomain(self::TEXT_DOMAIN, false,  current($dir) . DIRECTORY_SEPARATOR . 'languages');
    }

    /**
     * @param $string
     * @return string|void
     */
    static public function __($string)
    {
        return __($string, self::TEXT_DOMAIN);
    }
}
