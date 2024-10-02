<?php

namespace app\support;

class Flash
{
  public static function set(string $index, string $message)
  {
    if (!isset($_SESSION[$index])) {
      $_SESSION[$index] = $message;
    }
  }

  public static function get(string $index)
  {
    if (isset($_SESSION[$index])) {
      $message = $_SESSION[$index];
      unset($_SESSION[$index]);
      return $message;
    }
  }
}
