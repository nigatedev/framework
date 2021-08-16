<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
   
namespace Nigatedev\Console;

/**
 * Console Colors
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
 class Colors {
   
   /**
    * Message type success
    * 
    * @param string $message
    * 
    * @return string
    */
   public static function success($message)
   {
     return  "\033[42m Success \033[0m \033[32m $message \033[0m\n";
   }
   
   /**
    * Message type info
    * 
    * @param string $message
    * 
    * @return string
    */
   public static function info($message)
   {
     return  "\033[46m Info \033[0m \033[36m $message \033[0m\n";
   }
   
   /**
    * Message type warning
    * 
    * @param string $message
    * 
    * @return string
    */
   public static function warning($message)
   {
     return  "\033[43m ⚠ Warning \033[0m \033[33m $message \033[0m\n";
   }
   
   /**
    * Message type error
    * 
    * @param string $message
    * 
    * @return string
    */
   public static function error($message)
   {
     return  "\033[41m Error \033[0m \033[31m $message \033[0m\n";
   }
 }