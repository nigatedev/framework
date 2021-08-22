<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Database\Adapter;

use Nigatedev\App;
use PDO;

/**
 * Database connection
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class SqliteAdapter implements AdapterInterface
{
  
  /**
   * @var string[]
   */
    private array $config = [];
   
  /**
   * Constructor
   *
   * @param string[] $config
   */
    public function __construct(array $config)
    {
        $this->config = $config;
    }
   
    public function connect()
    {
        $pdo = null;
     
        $config = $this->config;
     
        try {
            $pdo = new PDO($config["dsn"]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $config["fetch"] ?? PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
     
        return $pdo;
    }
}
