<?php

namespace app\controllers;

use app\database\Connection;
use app\support\Slugify;

class HomeController extends Controller
{
  public function index()
  {
    $this->view("home", ["title" => "Página Inicial"]);
  }

  public function teste()
  {
    var_dump('teste');
  }
}
