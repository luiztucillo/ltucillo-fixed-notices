<?php

namespace LTucillo\Model;

class Update
{
    public function check()
    {
        add_filter('plugins_api', [$this, 'info'], 20, 3);
    }

    public function info($res, $action, $args)
    {
        if( $action !== 'plugin_information' ) {
            return;
        }

	    if ('YOUR_PLUGIN_SLUG' !== $args->slug) {
            return $res;
        }

        return;
    }
}
