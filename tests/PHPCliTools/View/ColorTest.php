<?php

/**
 * Use PHPUnit Extension
 */
use PHPUnit_Framework_TestCase as PHPUnit;
use PHPCliTools\View\Color as PCTColor;

/**
 * Test of class PHPCliTools\View\Color
 * @author Natan Augusto <natanaugusto@gmail.com>
 */
class ColorTest extends PHPUnit {

    public function setUp() {
        $this->font_colors = array('black',
            'dark_gray',
            'blue',
            'light_blue',
            'green',
            'light_green',
            'cyan',
            'light_cyan',
            'red',
            'light_red',
            'purple',
            'light_purple',
            'brown',
            'yellow',
            'light_gray',
            'white',
        );

        $this->background_colors = array(
            'black',
            'red',
            'green',
            'yellow',
            'blue',
            'magenta',
            'cyan',
            'light_gray',
        );
    }

    public function testColorString() {
        $s = "\033[0;35m\033[43mTesting Colors class\033[0m";

        $this->assertEquals($s, PCTColor::getString('Testing Colors class', 'purple', 'yellow', false), "
			Can't write string with font color purple and background yellow");

        $this->expectOutputString($s);
        PCTColor::getString('Testing Colors class', 'purple', 'yellow');
    }

    public function testColorLine() {
        $s = "\n\033[0;35m\033[43mTesting Colors class\n\033[0m";
        $this->assertEquals($s, PCTColor::getLine('Testing Colors class', 'purple', 'yellow', false));

        $this->expectOutputString($s);
        PCTColor::getLine('Testing Colors class', 'purple', 'yellow');
    }

    public function tearDown() {
        
    }

}
