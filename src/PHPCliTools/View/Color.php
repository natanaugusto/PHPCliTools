<?php

namespace PHPCliTools\View;

/**
 * PHPCliTools\View\Color provide methods to print colorful strings on CLI(Command Line Interface)
 * 
 * @author Natan Augusto <natanaugusto@gmail.com>
 * @package PHPCliTools
 * @subpackage View
 */
class Color {

    /**
     * Array of name and values of fonts color
     *
     * @var array Values:
     * black|dark_gray|blue|light_blue|green|light_green|cyan|light_cyan|red|light_red|purple|light_purple|brown|yellow|light_gray|white
     */
    protected static $fontColors = array(
        'black' => '0;30',
        'dark_gray' => '1;30',
        'blue' => '0;34',
        'light_blue' => '1;34',
        'green' => '0;32',
        'light_green' => '1;32',
        'cyan' => '0;36',
        'light_cyan' => '1;36',
        'red' => '0;31',
        'light_red' => '1;31',
        'purple' => '0;35',
        'light_purple' => '1;35',
        'brown' => '0;33',
        'yellow' => '1;33',
        'light_gray' => '0;37',
        'white' => '1;37'
    );

    /**
     * Array of name and values of backgrounds color
     *
     * @var array Values:
     * black,red,green,yellow,blue,magenta,cyan,light_gray
     */
    protected static $backgroundColors = array(
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'light_gray' => '47'
    );

    /**
     * Generate a colorful string
     *
     * @param string $string The string to be returned with the code coloring
     * @param string $fontColor The name of color to coloring the string
     * @param string $backgroundColor The name of color to coloring the string background
     * @return string The string formated to show colorful on CLI
     */
    public static function getString($string, $fontColor = '', $backgroundColor = '') {
        $strReturn = "";

        if (isset(self::$fontColors[$fontColor])) {
            $strReturn .= "\033[" . self::$fontColors[$fontColor] . "m";
        }

        if (isset(self::$backgroundColors[$backgroundColor])) {
            $strReturn .= "\033[" . self::$backgroundColors[$backgroundColor] . "m";
        }

        $strReturn .= $string . "\033[0m";
        return $strReturn;
    }
    
    /**
     * Generate a colorful line
     *
     * @param string $string The string to be returned with the code coloring
     * @param string $fontColor The name of color to coloring the string
     * @param string $backgroundColor The name of color to coloring the string background
     * @return string The string formated to show colorful on CLI
     */
    public static function getLine($string, $fontColor = '', $backgroundColor = '') {
        $strReturn = "\n";

        if (isset(self::$fontColors[$fontColor])) {
            $strReturn .= "\033[" . self::$fontColors[$fontColor] . "m";
        }

        if (isset(self::$backgroundColors[$backgroundColor])) {
            $strReturn .= "\033[" . self::$backgroundColors[$backgroundColor] . "m";
        }

        $strReturn .= $string . "\n\033[0m";
        return $strReturn;
    }

    /**
     * Returns font colors allowed by this class 
     * 
     * @return array
     */
    public static function getFontColors() {
        return array_keys(self::$fontColors);
    }

    /**
     * Returns background colors allowed by this class 
     * 
     * @return array
     */
    public static function getBackgroundColors() {
        return array_keys(self::$backgroundColors);
    }

}
