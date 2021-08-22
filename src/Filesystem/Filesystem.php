<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Filesystem;

use Nigatedev\Filesystem\Exceptions\FileNotFoundException;
use Nigatedev\Filesystem\Exceptions\DirNotFoundException;

/**
 * The Nigatedev PHP framework filesystem manipulator
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Filesystem
{
  
   /**
    * Default app root
    *
    * @var string $ROOT
    */
    public static $ROOT;
    
    /**
     * Constructor
     *
     * @param string $root
     */
    public function __construct($root)
    {
        self::$ROOT = $root;
    }
    
  /**
   * @var string $fieName
   */
    private string $fieName;
  
    public function isFile(string $fieName): bool
    {
        if (!file_exists($fieName)) {
            throw new FileNotFoundException("Fatal error: {$fieName} file not found");
        }
        return true;
    }
  
  /**
   * @param string $dirName
   *
   * @return bool
   */
    public function isDir($dirName)
    {
        if (!is_dir($dirName)) {
            throw new DirNotFoundException("Fatal error: {$dirName} directory not found");
        }
        return true;
    }
}
