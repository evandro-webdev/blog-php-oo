<?php

namespace app\library;

use Exception;

class Request
{
  public static function all()
  {
    return $_POST;
  }

  public static function input(string $name)
  {
    if (!isset($_POST[$name])) {
      throw new Exception("O campo $name não existe");
    }

    return $_POST[$name];
  }

  public static function except(string|array $except)
  {
    $fields = self::all();

    if (is_array($except)) {
      foreach ($except as $index => $field) {
        unset($fields[$field]);
      }
    }

    if (is_string($except)) {
      unset($fields[$except]);
    }

    return $fields;
  }

  public static function only(string|array $only)
  {
    $fields = self::all();
    $fieldsKey = array_keys($fields);
    $arr = [];

    foreach ($fieldsKey as $index => $value) {
      $onlyField = is_string($only) ? $only : (isset($only[$index]) ? $only[$index] : null);

      if (isset($fields[$onlyField])) {
        $arr[$onlyField] = $fields[$onlyField];
      }
    }

    return $arr;
  }
}
