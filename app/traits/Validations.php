<?php

namespace app\traits;

use app\library\Request;

trait Validations
{
  public function required($field)
  {
    $data = Request::input($field);

    if (empty($data)) {
      return null;
    }

    return strip_tags($data);
  }

  public function maxLen($field, $param)
  {
    $data = Request::input($field);

    if (strlen($data) > $param) {
      return null;
    }

    return strip_tags($data);
  }

  public function email($field)
  {
    if (!filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL)) {
      return null;
    }

    return strip_tags(Request::input($field));
  }
}
