<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Database;

use PDO;

/**
 * Database connection
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
 class DB {
   
   /**
    * @var PDO $pdo
    */
    private PDO $pdo;
    
   /**
    * @var array[] $configs
    */
    protected array $configs = [];
    
   public function __construct(array $configs)
   {
     $this->configs = $configs;
   }
   
   /**
    * Get Database connection
    */
   public function getDb()
   {
     try {
      $this->pdo = new PDO($this->configs['dsn'], $this->configs['user'], $this->configs['password']);
     } catch (PDOException $e) {
       die($e->getMessage());
     }
     return $this->pdo;
   }
 }