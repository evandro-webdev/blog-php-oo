<?php

namespace app\controllers;

class NotFoundController extends Controller
{
  public function index()
  {
    $this->view('errors/notfound', ['title' => 'Página não encontrada']);
  }
}
