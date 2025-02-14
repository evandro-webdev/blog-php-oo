<?php

namespace app\database\models;

use PDOException;

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
      return $this->executeQuery($sql, ['id' => $postId]);
    } catch (PDOException $e) {
      dd($e->getMessage());
    }
  }
}
