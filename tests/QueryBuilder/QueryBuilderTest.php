<?php
declare(strict_types=1);

namespace Nigatedev\QueryBuilder;

class QueryBuilderTest extends \PHPUnit\Framework\TestCase
{
  public function setUp(): void
  {
    $this->query = new QueryBuilder();
  }
  
  /** @test */
   public function isValidQueryKey()
   {
     $query = $this->query->isValidQueryKey("select");
     $this->assertTrue($query);
     
     $query = $this->query->isValidQueryKey("ben");
     $this->assertFalse($query);
   }
   
   
   /** @test */
   public function multipleSelect()
   {
     $multipleSelect = $this->query
              ->select("id", "name")
              ->from("product")
              ->toSQL();
     
     $this->assertEquals("SELECT id, name FROM product", (string)$multipleSelect);
     
     $multipleSelectWithArray = $this->query
              ->select(array("id", "name", "description"))
              ->from("product")
              ->toSQL();
     
     $this->assertEquals("SELECT id, name, description FROM product", (string)$multipleSelectWithArray);
     
   }
   
   /** @test */
   public function where()
   {
     $select = $this->query
                ->select("*")
                ->from("product")
                ->where("id = 10")
                ->toSQL();
     
     $this->assertEquals("SELECT * FROM product WHERE id = 10", (string)$select);
     
   }
   
   /** @test */
   public function limit()
   {
     $select = $this->query
                ->selectAll()
                ->from("product")
                ->limit(5)
                ->toSQL();
     
     $this->assertEquals("SELECT * FROM product LIMIT 5", (string)$select);
     
   }
}