<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

declare(strict_types=1);

namespace Nigatedev\QueryBuilder;

  /**
   * SQL QueryBuilderInterface
   *
   * @package Nigatedev
   * @subpackage QueryBuilder
   * @author Abass Ben Cheik <cheikabassben@gmail.com>
   */
interface QueryBuilderInterface
{
  
    /**
     * Select query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function selectQuery(): string;
    
    /**
     * Insert query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function insertQuery(): string;
    
    /**
     * Update query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function updateQuery(): string;
    
    /**
     * Delete query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function deleteQuery(): string;
    
    /**
     * Raw query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function rawQuery(): string;
}
