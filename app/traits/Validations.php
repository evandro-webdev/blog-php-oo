<?php

namespace app\traits;

use app\library\Request;
use app\support\Flash;

trait Validations
{
  public function required($field)
  {
    $data = Request::input($field);

    if (empty($data)) {
      Flash::set($field, 'O campo acima é obrigatório.');
      return null;
    }

    return strip_tags($data);
  }

  public function maxLen($field, $param)
  {
    $data = Request::input($field);

    if (strlen($data) > $param) {
      Flash::set($field, "O campo acima aceita no máximo $param caracteres.");
      return null;
    }

    return strip_tags($data);
  }

  public function email($field)
  {
    $data = Request::input($field);

    if (!filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL)) {
      Flash::set($field, "O email $data é inválido.");
      return null;
    }

    return strip_tags($data);
  }
}
