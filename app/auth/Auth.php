<?php

namespace app\auth;

class Auth
{
  public static function login($user)
  {
    if (!isset($_SESSION['auth'])) {
      $_SESSION['auth'] = $user;
    }
  }

  public static function isAdmin()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth']->is_admin;
  }

  public static function isAuth()
  {
    return isset($_SESSION['auth']);
  }

  public static function logout()
  {
    if (self::isAuth()) {
      unset($_SESSION['auth']);
    }
  }
}
