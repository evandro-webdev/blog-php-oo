<?php

namespace app\auth;

class Auth
{
  public static function login($user)
  {
    if (!isset($_SESSION['auth'])) {
      session_regenerate_id(true);
      $_SESSION['auth'] = $user;
      $_SESSION['last_activity'] = time();
      self::resetLoginAttempts();
    }
  }

  public static function isAuth()
  {
    if (isset($_SESSION['auth'])) {
      if (self::isExpired()) {
        self::logout();
        return false;
      }
      return true;
    }
    return false;
  }

  public static function isAdmin()
  {
    return self::isAuth() && $_SESSION['auth']->is_admin;
  }

  public static function logout()
  {
    unset($_SESSION['auth']);
  }

  public static function getUser()
  {
    return self::isAuth() ? $_SESSION['auth'] : null;
  }

  public static function isExpired($timeout = 18000 * 2)
  {
    if (isset($_SESSION['last_activity'])) {
      $inactive = time() - $_SESSION['last_activity'];
      return $inactive > $timeout;
    }

    return true;
  }

  public static function refreshSession()
  {
    if (self::isAuth()) {
      $_SESSION['last_activity'] = time();
    }
  }

  public static function trackLoginAttempts()
  {
    if (!isset($_SESSION['login_attempts'])) {
      $_SESSION['login_attempts'] = 0;
    }

    $_SESSION['login_attempts']++;

    if (self::loginAttempts() >= 5) {
      $_SESSION['blocked_until'] = time() + 60;
    }
  }

  private static function loginAttempts()
  {
    return $_SESSION['login_attempts'] ?? 0;
  }

  public static function isBlocked()
  {
    if (isset($_SESSION['blocked_until'])) {
      if (time() < $_SESSION['blocked_until']) {
        return true;
      } else {
        self::resetLoginAttempts();
      }
    }

    return false;
  }

  private static function resetLoginAttempts()
  {
    $_SESSION['login_attempts'] = 0;
    unset($_SESSION['blocked_until']);
  }
}
