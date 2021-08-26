<?php

declare(strict_types=1);

/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Support;

use Nigatedev\Support\Exception\StrException;

/**
 * String supports
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
abstract class AbstractStr
{
   /**
    * Check if the given data is string type
    * 
    * @param string $isStr
    * @return int
    * @throws StrException
    */
    protected static function isString($isStr)
    {
       if(is_string($isStr)){
         return true;
        } else {
       return false;
      }
    }
    
   /**
    * Check if the given data is numeric type
    * 
    * @param mixed $isNum
    * @return mixed
    * @throws StrException
    */
    protected static function isNumeric($isNum)
    {
       if(is_numeric($isNum)){
         return true;
        }
        return false;
    }
    
   /**
    * Check if the given data is int type
    * 
    * @param int $isInt
    * @return numeric
    * @throws StrException
    */
    protected static function isInteger($isInt)
    {
      if (filter_var($isInt, FILTER_VALIDATE_INT) === false || !is_int($isInt)) {
        return false;
      }
      return true;
    }
    
   /**
    * Get string length
    * 
    * @param string $str
    * @return int
    * @throws StrException
    */
    protected static function strLength($str)
    {
       if (static::isString($str)) {
         return strlen($str);
       }
       return false;
    }
    
   /**
    * Get string position
    * 
    * @param string $str
    * @return int|bool
    * @throws StrException
    */
    protected static function strPos($pos, $str)
    {
       if (static::isString($str)) {
         return strpos($pos, $str);
        } else {
        return false;
      }
    }
}