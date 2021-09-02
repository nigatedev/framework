<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Framework\Database;

use Nigatedev\Framework\Database\Exception\DBException;
use PDO;

/**
* Database Configuration
*
* @author Abass Ben Cheik <abass@todaysdev.com>
*/
class Config
{

    public static function getConfig()
    {
      try {
        
        if (isset($_ENV["MYSQL_DRIVER"]) && isset($_ENV["SQLITE_DRIVER"])) {
            throw new DBException("Fatal:  Error database configuration, only one driver can be used");
        } elseif (isset($_ENV["MYSQL_DRIVER"]) && (string)$_ENV["MYSQL_DRIVER"] === "mysql") {
            $driver = "mysql";
        } elseif (isset($_ENV["SQLITE_DRIVER"]) && (string)$_ENV["SQLITE_DRIVER"] === "sqlite") {
            $driver = "sqlite";
        } else {
            throw new DBException("Fatal: Can't find database configuration! Please check your .env file or try 'composer update'");
        }
      }
       catch (DBException $e) {
         die($e->getMessage());
      }
      
        return [
        "driver" => $driver,
        "mysql" => [
        "dsn" => $_ENV["MYSQL_DSN"] ?? "",
        "user" => $_ENV["DB_USER"] ?? "",
        "password" => $_ENV["DB_PASSWORD"] ?? "",
        ],
        "sqlite" => [
        "dsn" => $_ENV["SQLITE_DSN"]
        ]
        ];
    }
}
