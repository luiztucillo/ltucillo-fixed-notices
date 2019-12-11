<?php

namespace LTucillo\Model;

use LTucillo\Repositories\NoticeRepository;

class Setup
{
    /**
     * Setup constructor.
     */
    public function __construct()
    {
        $this->install();
    }

    private function install()
    {
        $v = \LTucilloApp::version();
        $dbVersion = get_option('ltucillo_notices_db_version', '0');

        if ($dbVersion == $v) {
            return;
        }

        $method = 'installv' . str_replace('.', '', $v);

        if (method_exists($this, $method)) {
            $this->$method();
            add_option('ltucillo_notices_db_version', $v);
        }
    }

    private function installv010()
    {
        global $wpdb;
        $tableName = $wpdb->prefix . NoticeRepository::TABLE;
        $charset = $wpdb->get_charset_collate();

        $sql = "
            CREATE TABLE IF NOT EXISTS $tableName (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                user_group VARCHAR(50) NOT NULL,
                level VARCHAR(20) NOT NULL,
                message TEXT NOT NULL
            ) $charset;
        ";

        $wpdb->query($sql);

        if ($wpdb->last_error != '') {
            throw new \Exception($wpdb->last_error);
        }
    }
}
