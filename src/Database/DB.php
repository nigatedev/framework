<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Database;

use PDO;
use Nigatedev\Database\Adapter\MysqlAdapter;
use Nigatedev\Database\Adapter\SqliteAdapter;
use Nigatedev\Database\Exception\DBException;

/**
 * Database connection
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class DB extends AbstractDB
{
   
   /**
    * @var string[] $configs
    */
    protected array $config = [];
    
    /**
     * @param string[] $configs
     */
    public function __construct($config)
    {
        $this->config = $config;
    }
   
   /**
    * Get Database connection
    * 
    * @return mixed
    */
    public function getDb()
    {
      if ((string)$this->getDriver() === "mysql") {
        return (new MysqlAdapter($this->config["mysql"]))->connect();
      } elseif ((string)$this->getDriver() === "sqlite") {
        return (new SqliteAdapter($this->config["sqlite"]))->connect();
      }
    }
    
}
