<?php

namespace app\database\models;

use PDO;
use PDOException;
use app\database\Connection;
use app\database\Filters;
use app\database\Pagination;
use PDOStatement;

abstract class Model
{
  protected string $table;
  private string $fields = '*';
  private ?Filters $filters = null;
  private string $pagination = '';

  public function setFields(string $fields): self
  {
    $this->fields = $fields;
    return $this;
  }

  public function setFilters(Filters $filters): self
  {
    $this->filters = $filters;
    return $this;
  }

  public function setPagination(Pagination $pagination): self
  {
    echo $this->count();
    $pagination->setTotalItems($this->count());
    $this->pagination = $pagination->dump();
    return $this;
  }

  protected function executeQuery(string $sql, array $params = []): PDOStatement
  {
    try {
      $stmt = Connection::connect()->prepare($sql);
      $stmt->execute($params);
      return $stmt;
    } catch (PDOException $e) {
      dd($e->getMessage());
    }
  }

  public function all(): array
  {
    $sql = "SELECT $this->fields FROM $this->table {$this->filters?->dump()} $this->pagination";
    $params = $this->filters ? $this->filters->getBind() : [];
    return $this->executeQuery($sql, $params)->fetchAll(PDO::FETCH_CLASS);
  }

  public function allDistinct(string|array $columns): array
  {
    $distinctColumns = is_array($columns) ? implode(',', $columns) : $columns;
    $sql = "SELECT DISTINCT $distinctColumns $this->fields FROM $this->table {$this->filters?->dump()} $this->pagination";

    $params = $this->filters ? $this->filters->getBind() : [];
    return $this->executeQuery($sql, $params)->fetchAll(PDO::FETCH_CLASS);
  }

  public function findBy(string $field, string $value): object|false
  {
    $sql = "SELECT $this->fields FROM $this->table WHERE $field = :$field";
    return $this->executeQuery($sql, [$field => $value])->fetchObject();
  }

  public function create(array $data): bool
  {
    $sql = "INSERT INTO $this->table (";
    $sql .= implode(',', array_keys($data)) . ") VALUES(:";
    $sql .= implode(',:', array_keys($data)) . ")";
    return $this->executeQuery($sql, $data)->rowCount() > 1;
  }

  public function update(string $id, array $data): bool
  {
    $sql = "UPDATE $this->table SET ";
    foreach ($data as $key => $value) {
      $sql .= "$key = :$key,";
    }

    $sql = rtrim($sql, ",");
    $sql .= " WHERE id = :id";
    $data['id'] = $id;

    return $this->executeQuery($sql, $data)->rowCount() > 0;
  }

  public function delete(string $id): bool
  {
    $sql = "DELETE FROM $this->table WHERE id = :id";
    return $this->executeQuery($sql, ['id' => $id])->rowCount() > 0;
  }

  public function count(): int
  {
    $sql = "SELECT COUNT(*) as total FROM $this->table {$this->filters?->dumpWithoutFilters()}";
    $params = $this->filters ? $this->filters->getBind() : [];
    return (int) $this->executeQuery($sql, $params)->fetchObject()->total;
  }
}
