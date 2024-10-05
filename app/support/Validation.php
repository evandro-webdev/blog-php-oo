<?php

namespace app\support;

use app\traits\Validations;
use Exception;

class Validation
{
  use Validations;

  public function validate(array $validations)
  {
    $inputValidation = [];

    foreach ($validations as $field => $validationType) {
      $havePipes = str_contains($validationType, '|');

      if (!$havePipes) {
        $param = '';
        [$validationType, $param] = $this->getParam($validationType, $param);

        $this->validationExist($validationType);
        $inputValidation[$field] = $this->$validationType($field, $param);
      } else {
        $validations = explode('|', $validationType);
        $param = '';
        $inputValidation[$field] = $this->multipleValidations($validations, $field, $param);
      }
    }

    return $this->returnValidation($inputValidation);
  }

  private function getParam($validationType, $param)
  {
    if (str_contains($validationType, ':')) {
      [$validationType, $param] = explode(':', $validationType);
    }

    return [$validationType, $param];
  }

  private function validationExist($validationType)
  {
    if (!method_exists($this, $validationType)) {
      throw new Exception("O metodo de validação $validationType não existe");
    }
  }

  private function multipleValidations($validations, $field, $param)
  {
    foreach ($validations as $validationType) {
      [$validationType, $param] = $this->getParam($validationType, $param);

      $this->validationExist($validationType);
      $inputValidation[$field] = $this->$validationType($field, $param);

      if ($inputValidation[$field] == null) {
        break;
      }
    }
    // dd($inputValidation);

    return $inputValidation[$field];
  }

  private function returnValidation($inputValidation)
  {
    if (in_array(null, $inputValidation, true)) {
      return null;
    }

    return $inputValidation;
  }
}