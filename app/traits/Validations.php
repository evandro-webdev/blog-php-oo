<?php

namespace app\traits;

use app\database\Filters;
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
      Flash::set($field, "O campo acima aceita no máximo '$param' caracteres.");
      return null;
    }

    return strip_tags($data);
  }

  public function minLen($field, $param)
  {
    $data = Request::input($field);

    if (strlen($data) < $param) {
      Flash::set($field, "O campo acima requer no minímo '$param' caracteres.");
      return null;
    }

    return strip_tags($data);
  }

  public function email($field)
  {
    $data = Request::input($field);

    if (!filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL)) {
      Flash::set($field, "O email '$data' é inválido.");
      return null;
    }

    return strip_tags($data);
  }

  public function unique($field, $param, $id = null)
  {
    str_contains($param, ',') ? [$model, $id] = explode(',', $param) : $model = $param;
    $data = Request::input($field);
    $filter = new Filters;
    $model = new $model;

    if (!$id) {
      $filter->where($field, '=', $data);
    } else {
      $filter->where($field, '=', $data, 'AND');
      $filter->where('id', '!=', $id);
    }

    $model->setFilters($filter);
    $registerFound = $model->all();

    if (count($registerFound) > 0) {
      Flash::set($field, "O dado informado '$data' já existe em nosso sistema.");
      return null;
    }

    return strip_tags($data);
  }

  public function matches($field, $compareTo)
  {
    $data = Request::input($field);
    $compareToData = Request::input($compareTo);

    if ($data !== $compareToData) {
      Flash::set($field, "As senhas informadas devem ser iguais.");
      return null;
    }

    return strip_tags($data);
  }

  public function image($field)
  {
    $image = $_FILES[$field];

    $allowedTypes = ['image/jpeg', 'image/jpg'];
    $maxFileSize = 2 * 1024 * 1024;

    if ($image['size'] > $maxFileSize) {
      return null;
      // throw new Exception("Arquivo excede o tamanho de 2MB");
    }

    if (!in_array($image['type'], $allowedTypes)) {
      return null;
      // throw new Exception("Tipo de arquivo não permitido");
    }

    return $image;
  }
}
