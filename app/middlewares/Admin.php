<?php

namespace app\middlewares;

use app\interfaces\MiddlewareInterface;
use app\auth\Auth as Auth;
use app\support\Flash;

class Admin implements MiddlewareInterface
{
  public function execute()
  {
    if (Auth::isExpired()) {
      Auth::logout();
      Flash::set('info', 'Sua sessão expirou. Por favor, faça login novamente.');
      return header('location: /auth/login');
    }

    if (!Auth::isAdmin()) {
      return header('location: /blog');
    }
  }
}
