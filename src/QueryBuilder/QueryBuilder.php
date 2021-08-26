<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

declare(strict_types=1);

namespace Nigatedev\QueryBuilder;

/**
* SQL QueryBuilder
*
* This QueryBuilder class is use to easily create/build SQL query
*
* @package Nigatedev
* @subpackage QueryBuilder
* @author Abass Ben Cheik <cheikabassben@gmail.com>
*/
class QueryBuilder extends AbstractQueryBuilder implements QueryBuilderInterface
{
    /**
     * @var mixed
     */
    protected $key = [];

  /**
  * @var string[] QUERY_KEY
  */
    protected const QUERY_KEY = [
    "select",
    "insert",
    "update",
    "delete"
    ];

  /**
  * @var array<string, array> DEFAULT_KEY
  */
    protected const DEFAULT_KEY = [
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
  * @{inheritdoc}
  */
    public function isValidQueryKey(string $type): bool
    {
        if (in_array($type, self::QUERY_KEY)) {
            return true;
        }
        return false;
    }

    public function selectAll(): self
    {
        $this->key["type"] = "select";
        $this->key["fields"] = "*";
        return $this;
    }

    public function from(string $table): self
    {
        $this->key["table"] = $table;
        return $this;
    }

    public function where(string $where): self
    {
        $this->key["where"] = $where;
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->key["limit"] = $limit;
        return $this;
    }

   /**
    * @param string[] $fields
    */
    public function select(...$fields): self
    {
        $this->key["type"] = "select";

        if (!is_array($fields[0])) {
            $this->key["fields"] = implode(", ", $fields);
        } else {
            $this->key["fields"] = implode(", ", $fields[0]);
        }

        return $this;
    }

  /**
  * @{inheritdoc}
  */
    public function selectQuery(): string
    {
        $key = array_merge(self::DEFAULT_KEY, $this->key);

        $sql = "SELECT {$key["fields"]} FROM {$key["table"]}";

        if ($key["where"]) {
            $sql .= " WHERE {$key["where"]}";
        }
        if ($key["limit"] > 0) {
            $limit = (int)$key["limit"];
            $sql .= " LIMIT {$limit}";
        }

        return $sql;
    }

  /**
  * @{inheritdoc}
  */
    public function insertQuery(): string
    {
      // TODO...
        return "";
    }

  /**
  * @{inheritdoc}
  */
    public function updateQuery(): string
    {
      // TODO...
        return "";
    }

  /**
  * @{inheritdoc}
  */
    public function deleteQuery(): string
    {
      // TODO...
        return "";
    }

  /**
  * @{inheritdoc}
  */
    public function rawQuery(): string
    {
      // TODO...
        return "";
    }

    /**
     * @return mixed
     */
    public function toSQL()
    {
        if (isset($this->key["type"])) {
            switch ($this->key["type"]) {
                case 'select':
                    return $this->selectQuery();
                case "insert":
                    return $this->insertQuery();
                case "update":
                    return $this->updateQuery();
                case "delete":
                    return $this->deleteQuery();
            }
        } else {
            throw new \Exception("ERRORS: Query builder can not built empty query");
        }
    }
}
