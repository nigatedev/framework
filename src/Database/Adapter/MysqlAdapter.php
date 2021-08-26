<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Database\Adapter;

use PDO;

/**
 * Database connection
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class MysqlAdapter implements AdapterInterface
{
  
  /**
   * @var string[]
   */
    private array $config = [];
   
  /**
   * Constructor
   *
   * @param string[] $config;
   */
    public function __construct(array $config)
    {
        $this->config = $config;
    }
   
   /**
    * Try to connect to the database
    *
    * @return mixed
    * @throw PDOException
    */
    public function connect()
    {
        $pdo = null;
     
        $config = $this->config;
     
        try {
            $pdo = new PDO($config["dsn"], $config["user"], $config["password"]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $config["fetch"] ?? PDO::FETCH_OBJ);
            $pdo->exec("SET NAMES utf8");
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
     
        return $pdo;
    }
}
