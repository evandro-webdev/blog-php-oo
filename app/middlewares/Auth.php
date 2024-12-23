<?php

namespace app\middlewares;

use app\support\Flash;
use app\library\Redirect;
use app\auth\Auth as AuthClass;
use app\interfaces\MiddlewareInterface;

class Auth implements MiddlewareInterface
{
  public function execute()
  {
    if (!AuthClass::isAuth()) {
      Flash::set('info', 'Sua sessão expirou ou você não está autenticado. Por favor, faça login novamente.');
      Redirect::to('/auth/login');
    }
  }
}
