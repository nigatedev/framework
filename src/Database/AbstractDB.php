<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
    public function setDriver(string $driver)
    {
         $this->driver = $driver;
    }
  
  /**
   * Get Database driver, example mysql or sqlite
   *
   * @return string
   */
    public function getDriver(): string
    {
        return $this->driver;
    }
}
