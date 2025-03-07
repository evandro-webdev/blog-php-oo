<?php

namespace app\services;

use app\database\Filters;
use app\database\models\User;

class UserService
{
  public function getUsersWithPosts()
  {
    $filter = (new Filters)->join('posts', 'users.id', '=', 'posts.userId', 'RIGHT JOIN');
    return (new User)->setFields('id, name, last_name, profile_pic')
      ->setFilters($filter)
      ->allDistinct('users.id');
  }
}
