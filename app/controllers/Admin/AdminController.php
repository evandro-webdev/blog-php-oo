<?php

namespace app\controllers\Admin;

use app\controllers\Controller;
use app\database\models\Post;
use app\library\Request;
use app\support\Slugify;

class AdminController extends Controller
{
  public function index()
  {
    $post = new Post;
    $posts = $post->all();
    $this->view('admin/blog/dashboard', ["title" => "Painel Administrativo", "posts" => $posts]);
  }

  public function create()
  {
    $this->view('admin/blog/create', ["title" => "Publicar novo post"]);
  }

  public function store()
  {
    $data = Request::all();
    $data['slug'] = Slugify::slugify($data['title']);
    $post = new Post;
    $post = $post->create($data);
    if ($post) {
      header('location: /admin');
    }
  }
  public function edit() {}
  public function update() {}
  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
      $post = new Post;
      $deletedPost = $post->delete($id);
      if ($deletedPost) {
        header('location: /admin');
      }
    }
  }
}
