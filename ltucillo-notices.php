<?php
/**
 * Plugin Name: Fixed Notices
 * Plugin URI: https://github.com/luiztucillo/test-travis-svn
 * Description: Put fixed notices in admin based on user groups
 * Version: 0.1.0
 * Author: Luiz Tucillo
 * Author URI: https://luiztucillo.com.br
 * Text Domain: ltucillo-notices
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
    define( 'WP_MP_PAP_NOTICES_BASENAME', plugin_basename(__FILE__));
}

/*
add_action('admin_notices', function() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p>Hello darkness, my old friend!</p>
    </div>
    <?php
});
*/

require(__DIR__ . '/LTucilloApp.php');
new LtucilloApp;
