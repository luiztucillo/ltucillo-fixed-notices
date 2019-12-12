<?php
/**
 * Plugin Name: LTucillo Fixed Notices
 * Plugin URI: https://github.com/luiztucillo/ltucillo-fixed-notices
 * Description: Put fixed notices in admin based on user groups
 * Version: 0.1.0
 * Author: Luiz Tucillo
 * Author URI: https://luiztucillo.com.br
 * Text Domain: ltucillo-fixed-notices
 *
 * @package LTucillo
 * @category Core
 * @author Luiz Tucillo
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if ( ! defined( 'WP_MP_PAP_NOTICES_BASENAME' ) ) {
    define('LTUCILLO_DIR', __DIR__);
    define('WP_MP_PAP_NOTICES_BASENAME', plugin_basename(__FILE__));
}

require(__DIR__ . '/App.php');
new App;
