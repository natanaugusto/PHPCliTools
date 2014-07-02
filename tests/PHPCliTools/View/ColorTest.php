<?php

/**
 * Use PHPUnit Extension
 */
use PHPUnit_Framework_TestCase as PHPUnit;
use PHPCliTools\View\Color as Color;

/**
 * Test of class PHPCliTools\Color
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
        $this->assertEquals("\033[0;35m\033[43mTesting Colors class\033[0m", Color::getString('Testing Colors class', 'purple', 'yellow'), "
			Can't write string with font color purple and background yellow");

        $this->assertEquals("\033[0;35m\033[43mTesting Colors class\033[0m\n", Color::getString('Testing Colors class', 'purple', 'yellow', true), "
			Can't write string with font color purple and background yellow with a breakline");
    }

    public function tearDown() {
        
    }

}
