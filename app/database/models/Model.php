<?php

namespace app\database\models;

use PDO;
use PDOException;
use app\database\Connection;

abstract class Model
{
  protected string $table;
  private string $fields = '*';

  public function setFields(string $fields)
  {
    $this->fields = $fields;
  }

  public function all()
  {
    try {
      $sql = "SELECT $this->fields FROM $this->table";

      $connection = Connection::connect();
      $prepare = $connection->prepare($sql);
      $prepare->execute();
      return $prepare->fetchAll(PDO::FETCH_CLASS);
    } catch (PDOException $e) {
      dd($e->getMessage());
    }
  }

  public function findBy(string $field, string $value)
  {
    $sql = "SELECT $this->fields FROM $this->table WHERE $field = :$field";

    $connection = Connection::connect();
    $prepare = $connection->prepare($sql);
    $prepare->execute([$field => $value]);
    return $prepare->fetchObject();
  }

  public function create(array $data)
  {
    try {
      $sql = "INSERT INTO $this->table (";
      $sql .= implode(',', array_keys($data)) . ") VALUES(:";
      $sql .= implode(',:', array_keys($data)) . ")";

      $connection = Connection::connect();
      $prepare = $connection->prepare($sql);
      return $prepare->execute($data);
    } catch (PDOException $e) {
      dd($e->getMessage());
    }
  }

  public function update(array $data, string $id) {}

  public function delete(string $id)
  {
    try {
      $sql = "DELETE FROM $this->table WHERE id = :id";
      $connection = Connection::connect();

      $prepare = $connection->prepare($sql);
      return $prepare->execute(['id' => $id]);
    } catch (PDOException $e) {
      dd($e->getMessage());
    }
  }
}