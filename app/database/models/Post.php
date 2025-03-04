<?php

namespace app\database\models;

class Post extends Model
{
  public function __construct()
  {
    $this->table = 'posts';
  }

  public function incrementViews($postId)
  {
    $sql = "UPDATE $this->table SET views = views + 1 WHERE id = :id";
    return $this->executeQuery($sql, ['id' => $postId]);
  }

  public function getTotalViews()
  {
    $sql = "SELECT SUM(views) as total_views FROM $this->table";
    return $this->executeQuery($sql)->fetchColumn();
  }
}
