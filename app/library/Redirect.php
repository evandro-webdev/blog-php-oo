<?php

namespace app\library;

class Redirect
{
  public static function to(string $to)
  {
    return header("location: $to");
  }

  public static function back()
  {
    if (isset($_SESSION['redirect'])) {
      return self::to($_SESSION['redirect']['previous']);
    }
  }

  public static function backWithData()
  {
    $_SESSION['old_data'] = Request::all();
    self::back();
  }

  private static function registerFirstRedirect(Route $route)
  {
    $_SESSION['redirect'] = [
      'actual' => $route->getRouteUriInstance()->getUri(),
      'previous' => '',
      'request' => $route->request
    ];
  }

  private static function registerRedirect(Route $route)
  {
    if (self::canChangeRedirect($route)) {
      $_SESSION['redirect'] = [
        'actual' => $route->getRouteUriInstance()->getUri(),
        'previous' => $_SESSION['redirect']['actual'],
        'request' => $route->request
      ];
    }
  }

  public static function register(Route $route)
  {
    !isset($_SESSION['redirect']) ?
      self::registerFirstRedirect($route) :
      self::registerRedirect($route);
  }

  private static function canChangeRedirect(Route $route)
  {
    return $route->getRouteUriInstance()->getUri() != $_SESSION['redirect']['actual'] &&
      $route->request == $_SESSION['redirect']['request'] ||
      $route->getRouteUriInstance()->getUri() == $_SESSION['redirect']['actual'] &&
      $route->request != $_SESSION['redirect']['request'];
  }
}
