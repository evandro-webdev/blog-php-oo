<?php

namespace app\middlewares;

use app\interfaces\MiddlewareInterface;
use app\auth\Auth as Auth;

class Admin implements MiddlewareInterface
{
  public function execute()
  {
    if (!Auth::isAdmin()) {
      header('location: /blog');
    }
  }
}