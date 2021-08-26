<?php
declare(strict_types=1);

namespace Nigatedev\Support;

use PHPUnit\Framework\TestCase;

class StrTest extends TestCase {
  
  /**
   * @test
   */
   public function length()
   {
     $this->assertEquals(9, Str::len("Nigatedev"));
   }
   
  /**
   * @test
   */
   public function position()
   {
     $this->assertEquals(19, Str::pos("https:/example.com/?id=1", "?"));
   }
   
  /**
   * @test
   */
   public function numeric()
   {
     $this->assertTrue(Str::isNum(9));
     $this->assertTrue(Str::isNum(9.0));
     $this->assertFalse(Str::isNum("k9"));
   }
   
  /**
   * @test
   */
   public function integer()
   {
     $this->assertTrue(Str::isInt(9));
     $this->assertFalse(Str::isInt("900"));
     $this->assertFalse(Str::isInt("k9"));
   }
}
