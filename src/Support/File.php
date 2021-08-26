<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Support;

/**
 * Support and helper for files system
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class File
{
   
   /**
    * Check whether file exist or not
    *
    * @param string $fileName
    * @return bool
    */
    public static function isFile(string $fileName): bool
    {
        return file_exists($fileName);
    }
   
   /**
    * Check whether directory exist or not
    *
    * @param string $dirName
    * @return bool
    */
    public static function isDir(string $dirName): bool
    {
        return is_dir($dirName);
    }
}
