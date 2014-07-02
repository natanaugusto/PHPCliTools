<?php

namespace PHPCliTools\View;

/**
 * PHPCliTools\View\HeadInterface is an interface for methods that must be created in Head classes
 * 
 * @author Natan Augusto <natanaugusto@gmail.com>
 * @package PHPCliTools
 * @subpackage View
 */
interface HeadInterface {
    public function get($text, $type = 'normal', $print = true);
    public function getTypes();
    public function setTypes($types);
}
