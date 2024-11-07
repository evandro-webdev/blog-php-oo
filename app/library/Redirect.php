<?php

namespace app\library;

class Redirect
{
  public static function to(string $to)
  {
    header("Location: $to");
    exit();
  }

  public static function back()
  {
    if (isset($_SESSION['redirect'])) {
      self::to($_SESSION['redirect']['previous']);
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
    $_SESSION['redirect'] = [
      'actual' => $route->getRouteUriInstance()->getUri(),
      'previous' => $_SESSION['redirect']['actual'],
      'request' => $route->request
    ];
  }

  public static function register(Route $route)
  {
    (!isset($_SESSION['redirect'])) ?
      self::registerFirstRedirect($route) :
      self::registerRedirect($route);
  }
}