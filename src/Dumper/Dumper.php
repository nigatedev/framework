<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Dumper;
 
 use Nigatedev\Dumper\Template\DumperTemplate;
 
 /**
  * Dumper class
  *
  * @author Abass Ben Cheik <abass@todaysdev.com>
  */
class Dumper extends DumperTemplate
{
   
    /**
     * @params $dumper can be any type of data
     *
     * @return dump values
     */
    public function dumper($data)
    {
        return $this->pre($data);
    }
}
