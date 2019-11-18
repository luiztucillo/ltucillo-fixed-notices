<?php

function loadFile($path, $className) {
    $directory = new RecursiveDirectoryIterator($path);
    $iterator = new RecursiveIteratorIterator($directory);

    foreach ($iterator as $info) {

        if ($info->getFilename() == '.' || $info->getFilename() == '..') {
            continue;
        }

        if ($info->getFilename() == $className . '.php') {
            require_once $info->getPathname();
            break;
        }
    }
}

spl_autoload_register(function($className) {
    if (substr($className, -4) == 'Mock') {
        loadFile(__DIR__ . '/mocks', $className);
        return;
    }

    if (substr($className, 0, 17) == 'WC_WooMercadoPago') {
        loadFile(__DIR__ . '/../includes', $className);
        return;
    }

    if (substr($className, 0, 2) == 'WC' && !class_exists('WooCommerce', false)) {
        include_once __DIR__ . '/../../woocommerce/woocommerce.php';
    }
});
