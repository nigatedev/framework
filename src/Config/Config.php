<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 namespace Nigatedev\Core\Config;

class Config
{
  
    public static $conf;
  
    public function __construct()
    {
        self::$conf = $this;
    }
}
