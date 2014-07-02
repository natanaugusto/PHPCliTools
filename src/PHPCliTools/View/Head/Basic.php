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

    /**
     * Array of header types. [font=coloroffont,backgroud=colorofbackground
     * @var array
     */
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

    /**
     * Get or print a header on Cli
     * 
     * @param string $text
     * @param string $type
     * @param boolean $print
     * @return string|void
     */
    public function get($text, $type = 'normal', $print = true) {
        $head = PCTColor::getLine($text, self::getType($type)->font, self::getType($type)->background);

        if ($print) {
            print $head;
        } else {
            return $head;
        }
    }

    /**
     * Get a object if is predefined
     * 
     * @param string $type
     * @return object
     */
    protected function getType($type = 'normal') {
        return (object) self::$types[$type];
    }

    /**
     * Return types array
     * 
     * @return array
     */
    public function getTypes() {
        return self::$types;
    }

    /**
     * Set a types array
     * 
     * @param array $types
     */
    public function setTypes($types) {
        self::$types = $types;
    }

}
