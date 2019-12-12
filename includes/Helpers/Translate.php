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
        load_plugin_textdomain(self::TEXT_DOMAIN, false, self::TEXT_DOMAIN . '/languages/');
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
