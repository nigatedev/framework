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
class Str extends AbstractStr
{
  
   /**
    * @{inheritdoc}
    */
    public static function len($str)
    {
        return self::strLength($str);
    }
  
   /**
    * @{inheritdoc}
    */
    public static function pos($str, $pos)
    {
        return self::strPos($str, $pos);
    }
  
   /**
    * @{inheritdoc}
    */
    public static function isNum($isNum)
    {
        return self::isNumeric($isNum);
    }
  
   /**
    * @{inheritdoc}
    */
    public static function isInt($isInt)
    {
        return self::isInteger($isInt);
    }
          
}
