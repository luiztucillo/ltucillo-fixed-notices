<?php
/**
 * Plugin Name: LTucillo Fixed Notices
 * Plugin URI: https://github.com/luiztucillo/ltucillo-fixed-notices
 * Description: Put fixed notices in admin based on user groups
 * Version: 0.1.3
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

if (!defined('LTUCILLO_FIXED_NOTICES_DIR')) {
    define('LTUCILLO_FIXED_NOTICES_DIR', __DIR__);
}

require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'App.php';
new LTucillo\App;

if (is_admin() || (defined('WP_CLI') && WP_CLI)) {
    add_action('init', [new \LTucillo\Model\Admin, 'init']);
}
