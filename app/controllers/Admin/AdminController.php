<?php

namespace app\controllers\Admin;

use app\controllers\Controller;

class AdminController extends Controller
{
  public function index()
  {
    $this->view('admin', ["title" => "Painel Administrativo"]);
  }
}