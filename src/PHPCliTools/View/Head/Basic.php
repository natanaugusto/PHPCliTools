<?php

namespace PHPCliTools\View\Head;

use PHPCliTools\View\Color as PCTColor;

/**
 * PHPCliTools\View\Head\Basic print basics heads on CLI(Command-Line Interface
 *
 * @author Natan Augusto <natanaugusto@gmail.com>
 * @package View
 * @subpackage Head
 */
class Basic implements \PHPCliTools\View\HeadInterface {

    protected static $types = array(
        'normal' => array(
            'font' => 'white',
            'background' => 'green'
        ),
        'warning' => array(
            'font' => 'white',
            'background' => 'yellow'
        ),
        'error' => array(
            'font' => 'white',
            'background' => 'red'
        )
    );

    public function get($text, $type = 'normal', $print = true) {
        $head = PCTColor::getLine($text, self::getType($type)->font, self::getType($type)->background);
        
        if ($print) {
            print $head;
        } else {
            return $head;
        }
    }
    
    protected function getType($type = 'normal') {
        return (object)self::$types[$type];
    }
    
    public function getTypes() {
        return self::$types;
    }

    public function setTypes($types) {
        self::$types = $types;
    }

}
