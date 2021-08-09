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
class Debugger
{
  
  /**
   * @var bool $debugMode
   */
    public static $debugMode = false;
  
  /**
   * Enable debug mode
   *
   * @return void
   */
    public static function enableDebugMode(): void
    {
        self::$debugMode = true;
    }
  
  /**
   * Get debug mode status
   *
   * @return bool
   */
    public function getDebugMode(): bool
    {
        return self::$debugMode;
    }
}
