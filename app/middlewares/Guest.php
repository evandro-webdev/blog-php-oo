<?php

namespace app\middlewares;

use app\auth\Auth;
use app\library\Redirect;
use app\interfaces\MiddlewareInterface;

class Guest implements MiddlewareInterface
{
  public function execute()
  {
    if (Auth::isAuth()) {
      if (Auth::isAdmin()) {
        Redirect::to('/admin/posts');
      } else {
        Redirect::to('/blog');
      }
    }
  }
}
