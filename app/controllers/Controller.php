<?php

namespace app\controllers;

use app\database\Pagination;
use Exception;
use League\Plates\Engine;

abstract class Controller
{
  protected function view(string $view, array $data = [])
  {
    $viewPath = "../app/views/$view.php";

    if (!file_exists($viewPath)) {
      throw new Exception("A view $view não existe.");
    }

    $template = new Engine("../app/views");
    echo $template->render($view, $data);
  }

  protected function createPagination($itemsPerPage)
  {
    $pagination = new Pagination();
    $pagination->setItemsPerPage($itemsPerPage);
    return $pagination;
  }
}
