<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 * 
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Core;

/**
 * HTTP request class
 * 
 * @Author Abass Ben Cheik <abass@todaysdev.com>
 */
class Request {
  
  /**
   * @return The path from the REQUEST_URI
   */
  public function getPath()
  {
    $path = $_SERVER["REQUEST_URI"] ?? "/";
    $pos = strpos($path, "?");
    
    if (!$pos) {
      return $path;
    }
    return substr($path, 0, $pos);
  }
  
  /**
   * @return The method from the REQUEST_METHOD
   */
  public function getMethod()
  {
    return strtolower($_SERVER["REQUEST_METHOD"]);
  }
}