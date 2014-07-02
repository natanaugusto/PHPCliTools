<?php

namespace PHPCliTools;

/**
 * PHPCliTools\Directory provide methods to work with directories CLI(Command Line Interface)
 * 
 * @author Natan Augusto <natanaugusto@gmail.com>
 * @package PHPCliTools
 */
abstract class Directory {

    public function getPath($path = null) {
        $path = is_null($path) ? false : $path;

        if (is_string($path) && strpos($path, DIRECTORY_SEPARATOR) !== 0) {
            $path = str_replace(DIRECTORY_SEPARATOR, '', $path);
            $path = getcwd() . DIRECTORY_SEPARATOR . $path;
        }

        return $path;
    }

    public function make($path = null, $overwrite = false, $mode = 0777) {
        $path = self::getPath($path);

        switch (self::isEmpty($path)) {
            case null:
                return mkdir($path, $mode, true);
            case true:
                if ($overwrite) {
                    return true;
                }

                return false;
            case false:
                if ($overwrite) {
                    self::delete($path);
                } else {
                    return false;
                }

                return mkdir($path, $mode, true);
        }
    }

    public function delete($path = null) {
        $path = self::getPath($path);

        if (self::isEmpty($path)) {
            return rmdir($path);
        } else {
            return false;
        }
    }

    public function isEmpty($path = null) {
        $path = self::getPath($path);

        if (!is_readable($path)) {
            return null;
        }

        return (count(scandir($path)) == 2);
    }

}
