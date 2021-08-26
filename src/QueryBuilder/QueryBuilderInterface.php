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
    public function selectQuery(): string;
    public function insertQuery(): string;
    public function updateQuery(): string;
    public function deleteQuery(): string;
    public function rawQuery(): string;
}
