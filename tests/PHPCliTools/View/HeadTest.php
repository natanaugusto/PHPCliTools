<?php

/**
 * Use PHPUnit Extension
 */
use PHPUnit_Framework_TestCase as PHPUnit;
use PHPCliTools\View\Head\Basic as HeadBasic;

/**
 * Test of class PHPCliTools\View\Head\Basic
 * @author Natan Augusto <natanaugusto@gmail.com>
 */
class HeadsTest extends PHPUnit {

    public function setUp() {
        parent::setUp();
    }

    public function testHeadBasic() {
        //Normal head with background green and text white
        $normalHead = "\n\033[1;37m\033[42mNormal Head\n\033[0m";
        $this->assertEmpty(HeadBasic::get('Normal Head'));
        $this->assertEquals($normalHead, HeadBasic::get('Normal Head', 'normal', false));

        //Warning head with background yellow and text white
        $warningHead = "\n\033[1;37m\033[43mWarning Head\n\033[0m";
        $this->assertEmpty(HeadBasic::get('Warning Head', 'warning'));
        $this->assertEquals($warningHead, HeadBasic::get('Warning Head', 'warning', false));

        //Errors head with background red and text white
        $errorHead = "\n\033[1;37m\033[41mError Head\n\033[0m";
        $this->assertEmpty(HeadBasic::get('Error Head', 'error'));
        $this->assertEquals($errorHead, HeadBasic::get('Error Head', 'error', false));
    }

    public function tearDown() {
        parent::tearDown();
    }

}
