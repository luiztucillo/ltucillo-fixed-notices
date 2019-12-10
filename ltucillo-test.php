<?php
/**
 * Plugin Name: Tucillo Test
 * Plugin URI: https://github.com/luiztucillo/test-travis-svn
 * Description: It's a test plugin to configura travis CI in wordpress SVN
 * Version: 0.1.0
 * Author: Luiz Tucillo
 * Author URI: https://luiztucillo.com.br
 * Text Domain: ltucillo-test
 *
 * @package LTucillo
 * @category Core
 * @author Luiz Tucillo
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if ( ! defined( 'WC_LTUCILLO_BASENAME' ) ) {
    define( 'WC_LTUCILLO_BASENAME', plugin_basename( __FILE__ ) );
}

add_action('admin_notices', function() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p>Hello darkness, my old friend!</p>
    </div>
    <?php
});
