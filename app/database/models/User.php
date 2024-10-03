<?php

namespace app\database\models;

class User extends Model
{
  public function __construct()
  {
    $this->table = 'users';
  }
}
