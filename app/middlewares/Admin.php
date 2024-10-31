<?php

namespace app\middlewares;

use app\support\Flash;
use app\library\Redirect;
use app\auth\Auth as Auth;
use app\interfaces\MiddlewareInterface;

class Admin implements MiddlewareInterface
{
  public function execute()
  {
    if (Auth::isExpired()) {
      Auth::logout();
      Flash::set('info', 'Sua sessão expirou. Por favor, faça login novamente.');
      Redirect::to('/auth/login');
    }

    if (!Auth::isAdmin()) {
      Redirect::to('/blog');
    }
  }
}
