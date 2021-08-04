<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
namespace Nigatedev\Core\Debugger;
   
/**
 * Debugger class
 * 
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Debugger {
  
  /**
   * @var bool $debugMode
   */
  public static $debugMode = false;
  
  /**
   * Enable debug mode
   */
  public static function enableDebugMode()
  {
    self::$debugMode = true;
  }
  
  /**
   * Get debug mode status
   */
  public function getDebugMode(): bool
  {
    return self::$debugMode;
  }
}