<?php

namespace LTucillo\View;

use LTucillo\App;

/**
 * Class Template
 */
abstract class Template
{
    /**
     * Should return single file name
     * Ex.: "config_page" to reference to /templates/config_page.php
     * @return string
     */
    abstract public function getTemplate();

    /**
     * @throws \Exception
     */
    public function render()
    {
        echo $this->fetchView($this->getTemplate());
    }

    /**
     * @param $template
     * @return false|string
     * @throws \Exception
     */
    protected function fetchView($template)
    {
        $template = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $template);
        $includeFilePath = App::getPluginDir(false) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR
            . $template . '.php';

        if (!file_exists($includeFilePath)) {
            throw new \Exception('File path ' . $includeFilePath . ' not found');
        }

        ob_start();
        include $includeFilePath;

        return ob_get_clean();
    }

    /**
     * @throws \Exception
     */
    public function __toString()
    {
        return $this->fetchView($this->getTemplate());
    }
}
