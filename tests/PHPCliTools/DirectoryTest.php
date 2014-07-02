<?php

/**
 * Use PHPUnit Extension
 */
use PHPUnit_Framework_TestCase as PHPUnit;
use PHPCliTools\Directory as PCTDirectory;

/**
 * Description of FolderTest
 *
 * @author natan
 */
class FolderTest extends PHPUnit {

    public function setUp() {
        //Don't work
        $this->path = realpath('.');
        parent::setUp();
    }

    public function tearDown() {
        parent::tearDown();
    }

    public function testGetPath() {
        $this->assertEquals($this->path . DIRECTORY_SEPARATOR . 'bla', PCTDirectory::getPath('bla'));
        $this->assertEquals(null, PCTDirectory::getPath());
        $this->assertEquals(false, PCTDirectory::getPath());
    }

    public function testIsEmpty() {
        mkdir($this->path . DIRECTORY_SEPARATOR . 'empty');
        $this->assertEquals(true, PCTDirectory::isEmpty('empty'), 'The empty/ directory is not empty!');
        rmdir($this->path . DIRECTORY_SEPARATOR . 'empty');
        $this->assertEquals(null, PCTDirectory::isEmpty('empty'), 'The empty/ directory is not null!');
        $this->assertEquals(false, PCTDirectory::isEmpty('vendor'), 'The vendor/ directory is empty!');
    }

    public function testDelete() {
        mkdir($this->path . DIRECTORY_SEPARATOR . 'delete');
        $this->assertEquals(true, PCTDirectory::isEmpty('delete'));
        $this->assertEquals(true, PCTDirectory::delete('delete'));
        $this->assertEquals(null, PCTDirectory::isEmpty('delete'));
    }

    public function testMake() {
        PCTDirectory::delete('make');
        $this->assertEquals(true, PCTDirectory::make('make'), 'The directory make/ could not be created!');
        $this->assertEquals(false, PCTDirectory::make('make'), 'The directory make/ was created!');
        $this->assertEquals(true, PCTDirectory::make('make', true), 'The directory make/ could not be created!');
        $this->assertEquals(true, PCTDirectory::isEmpty('make'));
    }

}
