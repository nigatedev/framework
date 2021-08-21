<?php
declare(strict_types=1);

/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Support;

/**
 * Support and helper for strings
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Str
{
   /**
    * @param string $str
    */
    public static function length(string $str)
    {
      if (strlen($str) > 0) {
        return true;
      }
      return false;
    }
}
