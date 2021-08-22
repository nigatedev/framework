<?php
namespace Nigatedev\Database;

use PHPUnit\Framework\TestCase;

class DBTest extends TestCase {
  
  public function setUp(): void
  {
    $this->db = new DB([
        "driver"   => "mysql",
        "dsn"      => "mysql:host=127.0.0.1:3306;dbname=test;",
        "user"     => "root",
        "password" => "root"
      ],
        ["fetch" => "PDO::FETCH_OBJ"]
      );
  }
  
  /**
   * @test
   */
   public function getAndSetDriver()
   {
     $driver = $this->db;
     $this->assertEquals("mysql", $driver->getDriver());
     
     $driver->setDriver("sqlite");
     $this->assertEquals("sqlite", $driver->getDriver());
   }
  
  /**
   * @test
   */
   public function getAndSetFetchMode()
   {
     $fetch = $this->db;
    
     $this->assertEquals("PDO::FETCH_OBJ", $fetch->getFetch());
    
     $fetch->setFetch("PDO::FETCH_ASSOC");
     $this->assertEquals("PDO::FETCH_ASSOC", $fetch->getFetch());
   }
  
}