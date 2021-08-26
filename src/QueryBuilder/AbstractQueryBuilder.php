<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

declare(strict_types=1);

namespace Nigatedev\QueryBuilder;

  /**
   * AbstractQueryBuilder
   *
   * @package Nigatedev
   * @subpackage QueryBuilder
   * @author Abass Ben Cheik <cheikabassben@gmail.com>
   */
abstract class AbstractQueryBuilder
{
    abstract protected function isValidQueryKey(string $type): bool;
}
