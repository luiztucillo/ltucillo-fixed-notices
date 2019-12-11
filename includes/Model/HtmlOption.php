<?php

namespace LTucillo\Model;

use LTucillo\Helpers\Translate;

/**
 * Class HtmlOption
 * @package LTucillo\Model
 */
class HtmlOption
{
    /**
     * @var
     */
    private $value;
    /**
     * @var
     */
    private $label;

    /**
     * HtmlOption constructor.
     * @param $value
     * @param $label
     */
    public function __construct($value, $label)
    {
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return Translate::__($this->label);
    }
}
