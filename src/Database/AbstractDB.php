<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Database;

use Nigatedev\Support\Str;
use PDO;
/**
 * AbstractDB
 * 
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
abstract class AbstractDB
{
  /**
   * @var string
   */
  private $driver;
  
  /**
   * Set Database driver, example mysql or sqlite
   * 
   * @param string $driver
   * @return void
   */
  public function setDriver(srting $driver = null) 
  {
       $this->driver = $driver;
  }
  
  public function getDriver() 
  {
    $configs = Config::getConfig();
    
    if ($this->driver === null) {
      if (isset($configs["driver"]) && Str::length($configs["driver"]) > 0) {
         $this->driver = $configs["driver"];
      } else {
        $this->driver = "mysql";
      }
    }
    return $this->driver;
  }
}
  