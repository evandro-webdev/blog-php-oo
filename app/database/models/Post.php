<?php

namespace app\database\models;

class Post extends Model
{
  public function __construct()
  {
    $this->table = 'posts';
  }
}
