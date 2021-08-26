<?php
/*
 * This file is part of the Nigatedev framework package.
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
class DB
{
   /**
    * @var string
    */
    private $dbDSN;
    
   /**
    * @var string
    */
    private $dbUser;
    
   /**
    * @var string
    */
    private $dbPassword;
    
   /**
    * @var string
    */
    protected static $selfDriver;
    
   /**
    * @var string[]
    */
    protected static array $selfConfig = [];
    
    
   /**
    * @var string[]
    */
    protected static array $selfOptions = [];
    
    /**
     * @var string[]
    */
    protected array $config = [];
    
    /**
     * @var string[]
    */
    protected array $options = [];
    
    /**
     * @var string
    */
    private $driver;
    
    /**
     * @var string
    */
    private $fetch;
    
    /**
     * @var string[]
    */
     const  SUPPORTED_DRIVER = ["mysql", "sqlite"];
    
    /**
     * Constructor
     *
     * @param string[] $config
     * @param string[] $options
     *
     * @return void
     */
    public function __construct($config, $options = [])
    {
        $this->config = $config;
        $this->options = $options;
    }
    
   /**
    * Overwrite database configuration
    *
    * @param string $driver
    * @param string[] $selfConfig
    * @param string[] $selfOptions
    *
    * @return mixed
    */
    public static function config(string $driver, array $selfConfig = [], array $selfOptions = [])
    {
        self::$selfDriver = $driver;
        self::$selfConfig = $selfConfig;
        self::$selfOptions = $selfOptions;
    }
    
    /**
     * Set driver
     *
     * @param string $driver
     * @return self
     */
    public function setDriver(string $driver): self
    {
        $this->driver = $driver;
       
        return $this;
    }
     
    /**
     * Set fetch mode
     *
     * @param string $fetch
     * @return self
     */
    public function setFetch(string $fetch): self
    {
        $this->fetch = $fetch;
       
        return $this;
    }
     
    /**
     * Get Driver
     *
     * @return string
     */
    public function getDriver()
    {
        if ($this->driver == null) {
            $driver = self::$selfDriver ?? $this->config["driver"];
        } else {
            $driver = $this->driver;
        }
        if (strlen($driver) < 1) {
            throw new DBException("Fatal: not driver found for this configuration");
        } elseif (!in_array($driver, static::SUPPORTED_DRIVER)) {
            throw new DBException(printf("Fatal: %s is not supposed as driver!", $driver));
        }
        return $driver;
    }
    
    /**
     * Get fetch mode
     *
     * @return string
     */
    public function getFetch()
    {
        if ($this->fetch == null) {
            $fetch = self::$selfOptions["fetch"] ?? $this->options["fetch"];
        } else {
            $fetch = $this->fetch;
        }
        return $fetch;
    }
    
    /**
     * Set ...
     *
     * @param string $dbDSN;
     *
     * @return self
     */
    public function setDbDSN(string $dbDSN)
    {
        $this->dbDSN = $dbDSN;
       
        return $this;
    }
     
    /**
     * Set ...
     *
     * @param string $dbUser;
     *
     * @return self
     */
    public function setDbUser(string $dbUser): self
    {
        $this->dbUser = $dbUser;
       
        return $this;
    }
     
    /**
     * Set ...
     *
     * @param string $dbPassword;
     *
     * @return self
     */
    public function setPassword(string $dbPassword): self
    {
        $this->dbPassword = $dbPassword;
       
        return $this;
    }
     
    /**
     * Get database DSN
     *
     * @return string
     */
    public function getDbDSN()
    {
        if ($this->dbDSN == null) {
            $dbDSN = self::$selfConfig["dsn"] ?? $this->config["dsn"];
        } else {
            $dbDSN = $this->dbDSN;
        }
        return $dbDSN;
    }
     
    /**
     * Get database user name
     *
     * @return string
     */
    public function getDbUser()
    {
        if ($this->dbUser == null) {
            $dbUser = self::$selfConfig["user"] ?? $this->config["user"];
        } else {
            $dbUser = $this->dbUser;
        }
        return $dbUser;
    }
     
    /**
     * Get database user password
     *
     * @return string
     */
    public function getDbPassword()
    {
        if ($this->dbPassword == null) {
            $dbPassword = self::$selfConfig["password"] ?? $this->config["password"];
        } else {
            $dbPassword = $this->dbPassword;
        }
        return $dbPassword;
    }
     
   /**
    * Get Database connection
    *
    * @return mixed
    */
    public function getConnection()
    {
        $configs = [
        "driver" => $this->getDriver(),
        "dsn" => $this->getDbDSN(),
        "user" => $this->getDbUser(),
        "password" => $this->getDbPassword(),
        "fetch"  => $this->getFetch()
        ];
      
        if ($configs["driver"] === "mysql") {
            return (new MysqlAdapter($configs))->connect();
        }
        return (new SqliteAdapter($configs))->connect();
    }
}
