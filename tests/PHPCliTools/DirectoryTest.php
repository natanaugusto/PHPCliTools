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
        $this->path = realpath('.');
        $this->tree = $tree = array(
            'tree/tree1',
            'tree/tree2',
            'tree/tree3' => array(
                'treechild'
            )
        );
        $this->tree_src = array(
            'PHPCliTools' => array(
                'View' => array(
                    'Head'
                )
            )
        );
        parent::setUp();
    }

    public function tearDown() {
        parent::tearDown();
    }

    public function testGetPath() {
        $this->assertEquals($this->path . DIRECTORY_SEPARATOR . 'bla', PCTDirectory::getPath('bla'));
        $this->assertEquals($this->path . DIRECTORY_SEPARATOR . 'test.php', PCTDirectory::getPath('test.php/'));
        $this->assertEmpty(PCTDirectory::getPath('test.php'));
        $this->assertEmpty(PCTDirectory::getPath());
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

    public function testGetTreeByPath() {
        $this->assertEquals(array('PHPCliTools'), PCTDirectory::getTreeByPath('src'));
        $this->assertEquals($tree, PCTDirectory::getTreeByPath('src', true));
        $this->assertEquals(null, PCTDirectory::getTreeByPath('no_exis'));
    }

    public function testTree() {
        $this->assertEquals(true, PCTDirectory::delete('tree', true));

        $tree = array(
            'tree/tree1',
            'tree/tree2',
            'tree/tree3' => array(
                'treechild'
            )
        );

        //Delete tree
        $this->assertEquals(true, PCTDirectory::tree('PCTDirectory::delete', 'tree'));
        $this->assertEquals(true, PCTDirectory::tree('PCTDirectory::make', $tree, array(':path:', true)));
        $this->assertEquals(true, PCTDirectory::tree('PCTDirectory::delete', 'tree', array(':path:', true)));
        //Create tree
        $this->assertEquals(true, PCTDirectory::tree('PCTDirectory::make', $tree));
    }

}
