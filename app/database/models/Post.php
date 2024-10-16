<?php

namespace app\database\models;

use PDOException;
use app\database\Connection;

class Post extends Model
{
  public function __construct()
  {
    $this->table = 'posts';
  }

  public function incrementViews($postId)
  {
    try {
      $sql = "UPDATE $this->table SET views = views + 1 WHERE id = :id";
      $connection = Connection::connect();
      $prepare = $connection->prepare($sql);
      return $prepare->execute(['id' => $postId]);
    } catch (PDOException $e) {
      dd($e->getMessage());
    }
  }
}
