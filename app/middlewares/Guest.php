<?php

namespace app\middlewares;

use app\auth\Auth;
use app\interfaces\MiddlewareInterface;

class Guest implements MiddlewareInterface
{
  public function execute()
  {
    if (Auth::isAuth()) {
      if (Auth::isAdmin()) {
        return header('location: /admin');
      } else {
        return header('location: /blog');
      }
    }
  }
}