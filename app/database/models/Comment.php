<?php

namespace app\database\models;

class Comment extends Model
{
  public function __construct()
  {
    $this->table = 'comments';
  }
}
