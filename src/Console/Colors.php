<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
   
namespace Nigatedev\Console;

use Nigatedev\Console\Exception\ConsoleException;

/**
 * Console Colors
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Colors
{
    
   /**
    * Color with background 
    *
    * @param string $message
    *
    * @return string
    */
    public static function temp($type, $subject = "", $message = "")
    {
        $temp = "";
        
        switch ($type) {
          case 'SUCCESS':
            $temp = "\033[42m{$type}\033[0m {$subject} {$message}";
            break;
          case 'INFO':
            $temp = "\033[46m{$type}\033[0m {$subject} {$message}";
            break;
          case 'WARNING':
            $temp = "\033[43m{$type}\033[0m {$subject} {$message}";
            break;
          case 'ERROR':
            $temp = "\033[41m{$type}\033[0m {$subject} {$message}";
            break;
          
          default:
            throw new ConsoleException("Invalid or undefined Color type!");
            break;
        }
        
        echo($temp);
    }
   
   /**
    * Message type success color
    *
    * @param string $message
    *
    * @return string
    */
    public static function success($message)
    {
        return  "\033[32m$message\033[0m";
    }
   
   /**
    * Message type success background
    *
    * @param string $message
    *
    * @return string
    */
    public static function successTemp($message)
    {
        return  "\033[42m SUCCESS\033[0m" . self::success($message);
    }
   
   /**
    * Message type info color
    *
    * @param string $message
    *
    * @return string
    */
    public static function info($message)
    {
        return  "\033[36m$message\033[0m";
    }
   
   /**
    * Message type info background
    *
    * @param string $message
    *
    * @return string
    */
    public static function infoTemp($message)
    {
        return  "\033[46m INFO\033[0m". self::info($message);
    }
   
   /**
    * Message type warning color
    *
    * @param string $message
    *
    * @return string
    */
    public static function warning($message)
    {
        return  "\033[33m$message\033[0m";
    }
   
   /**
    * Message type warning background
    *
    * @param string $message
    *
    * @return string
    */
    public static function warningTemp($message)
    {
        return  "\033[43m WARNING\033[0m" . self::warning($message);
    }
   
   /**
    * Message type error color
    *
    * @param string $message
    *
    * @return string
    */
    public static function error($message)
    {
        return  "\033[31m$message\033[0m";
    }
    
   /**
    * Message type error background
    *
    * @param string $message
    *
    * @return string
    */
    public static function errorTemp($message)
    {
        return  "\033[41m ERROR\033[0m" . self::error($message);
    }
    
   /**
    * Message type danger color
    *
    * @param string $message
    *
    * @return string
    */
    public static function danger($message)
    {
        return self::error($message);
    }
}
