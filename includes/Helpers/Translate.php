<?php

namespace LTucillo\Helpers;

use LTucillo\App;

/**
 * Class Translate
 * @package LTucillo\Helpers
 */
class Translate
{
    const TEXT_DOMAIN = 'ltucillo-fixed-notices';

    static public function init()
    {
        $dir = App::getPluginDir() . DIRECTORY_SEPARATOR;
        load_plugin_textdomain(self::TEXT_DOMAIN, false,  $dir . 'languages');
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
