<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
   
  /**
  * @var string[] DEFAULT_KEY
  */
    protected const QUERY_KEY = [
    "select",
    "insert",
    "update",
    "delete"
    ];

  /**
  * @var array<string, array> DEFAULT_SQL
  */
    protected const DEFAULT_SQL = [
    "primary_key" => "",
    "selectors" => [],
    "distinct" => false,
    "replace" => false,
    "orderBy" => [],
    "fields" => "*",
    "where" => null,
    "limit" => 0,
    "table" => "",
    "from" => [],
    "type" => "",
    "and" => [],
    "raw" => "",
    "or" => []
    ];

  /**
   * Query type checker
   *
   * @return bool
   */
    public function isValidQueryKey(string $type): bool
    {
        if (in_array($type, self::QUERY_KEY)) {
            return true;
        }
        return false;
    }
}
