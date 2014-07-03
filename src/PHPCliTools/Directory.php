<?php

namespace PHPCliTools;

use Exception;

/**
 * PHPCliTools\Directory provide methods to work with directories CLI(Command Line Interface)
 * 
 * @author Natan Augusto <natanaugusto@gmail.com>
 * @package PHPCliTools
 */
abstract class Directory {

    /**
     * Return the complete path of a directory
     * @param string $path
     * @return string
     */
    public function getPath($path = null) {
        $path = is_null($path) ? false : $path;

        if (is_string($path) && strpos($path, DIRECTORY_SEPARATOR) !== 0) {
            $path = str_replace(DIRECTORY_SEPARATOR, '', $path);
            $path = getcwd() . DIRECTORY_SEPARATOR . $path;
        }

        return $path;
    }

    /**
     * Make a diectory
     * (The parameter recursive of php function make always is true)
     * @param string $path
     * @param boolean $overwrite
     * @param int $mode
     * @return boolean
     * @throws Exception
     */
    public function make($path = null, $overwrite = false, $mode = 0777) {
        $path = self::getPath($path);

        switch (self::isEmpty($path)) {
            case null:
                return mkdir($path, $mode, true);
            case true:
                if ($overwrite) {
                    return true;
                }

                throw new Exception('The directory will not be modify! Try use $overwrite like true!');
            case false:
                if ($overwrite) {
                    self::delete($path);
                } else {
                    return false;
                }

                return mkdir($path, $mode, true);
        }
    }
    
    public function getTreeByPath($path, $recursive = false) {
        if(!is_string($path)) {
            throw new Exception('The $path parameter not is a string!');
        }
    }
    
    public function tree($callback, $paths, $params = null) {
        
    }

    /**
     * Delete a directory
     * @param string $path
     * @param boolean $recursive
     * @return boolean
     */
    public function delete($path = null, $recursive = false) {
        $path = self::getPath($path);

        switch (self::isEmpty($path)) {
            case null:
                return true;
            case true:
                return rmdir($path);
            case false:
                if ($recursive == true) {
                    return false;
                }
                return false;
        }

        return true;
    }

    /**
     * Verify if directory is empty or not.
     * (Return null case the directory not exist)
     * @param string $path
     * @return null|boolean
     */
    public function isEmpty($path = null) {
        $path = self::getPath($path);

        if (!is_readable($path)) {
            return null;
        }

        return (count(scandir($path)) == 2);
    }

}
