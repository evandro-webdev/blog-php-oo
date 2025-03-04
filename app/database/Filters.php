<?php

namespace app\database;

use InvalidArgumentException;

class Filters
{
  private array $filters = [];
  private array $binds = [];
  private array $validOperators = ['=', '!=', '>', '<', '>=', '<=', 'IN', 'NOT IN', 'LIKE'];

  public function distinct(): self
  {

    return $this;
  }

  public function where(string $field, string $operator, mixed $value, string $logic = ''): self
  {
    if (!in_array(strtoupper($operator), $this->validOperators)) {
      throw new InvalidArgumentException("Operador inválido: $operator");
    }

    if (is_array($value)) {
      $formatter = "('" . implode("','", $value) . "')";
    } else if (is_string($value)) {
      $formatter = "'$value'";
    } else if (is_bool($value)) {
      $formatter = $value ? 1 : 0;
    } else {
      $formatter = $value;
    }

    $value = strip_tags($formatter);

    $fieldBind = str_contains($field, '.') ? str_replace('.', '', $field) : $field;
    $this->filters['where'][] = "$field $operator :$fieldBind $logic ";
    $this->binds[$fieldBind] = trim($value, "'");

    return $this;
  }

  public function join(string $foreignTable, string $joinTable1, string $operator, string $joinTable2, string $joinType = 'INNER JOIN'): self
  {
    $this->filters['join'][] = " $joinType $foreignTable ON $joinTable1 $operator $joinTable2 ";
    return $this;
  }

  public function groupBy($field): self
  {
    $this->filters['groupBy'] = " GROUP BY $field";
    return $this;
  }

  public function orderBy(string $field, string $order = 'ASC'): self
  {
    $this->filters['order'] = " ORDER BY $field $order ";
    return $this;
  }

  public function limit(int $limit)
  {
    $this->filters['limit'] = " LIMIT $limit";
    return $this;
  }

  public function getBind()
  {
    return $this->binds;
  }

  public function dump()
  {
    $filter = !empty($this->filters['join']) ? implode('', $this->filters['join']) : '';
    $filter .= !empty($this->filters['where']) ? ' WHERE ' . implode('', $this->filters['where']) : '';
    $filter .= $this->filters['groupBy'] ?? '';
    $filter .= $this->filters['order'] ?? '';
    $filter .= $this->filters['limit'] ?? '';

    return $filter;
  }

  public function dumpWithoutGroupBy()
  {
    $filter = !empty($this->filters['join']) ? implode('', $this->filters['join']) : '';
    $filter .= !empty($this->filters['where']) ? ' WHERE ' . implode('', $this->filters['where']) : '';

    return $filter;
  }
}
