<?php

namespace app\database\models;

class Category extends Model
{
  public function __construct()
  {
    $this->table = 'categories';
  }
}
