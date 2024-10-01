<?php

namespace app\database;

class Filters
{
  private array $filters = [];
  private array $binds = [];

  public function where(string $field, string $operator, mixed $value, string $logic = '')
  {
    $formatter = '';

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
    $this->filters['where'][] = "$field $operator :$fieldBind $logic";
    $this->binds[$fieldBind] = trim($value);
  }

  public function join(string $foreignTable, string $joinTable1, string $operator, string $joinTable2, string $joinType = 'INNER JOIN')
  {
    $this->filters['join'][] = "$joinType $foreignTable ON $joinTable1 $operator $joinTable2";
  }

  public function getBind()
  {
    return $this->binds;
  }

  public function dump()
  {
    $filter = !empty($this->filters['join']) ? implode('', $this->filters['join']) : '';
    $filter .= !empty($this->filters['where']) ? ' WHERE ' . implode('', $this->filters['where']) : '';

    return $filter;
  }
}
