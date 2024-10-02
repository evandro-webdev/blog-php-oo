<?php

namespace app\controllers\Admin;

use app\controllers\Controller;
use app\library\Request;
use app\support\Slugify;
use app\database\models\Post;
use app\database\models\Category;
use app\support\Validation;

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
    $category = new Category;
    $categories = $category->all();
    $this->view('admin/blog/create', ["title" => "Publicar novo post", "action" => "/admin/posts", "categories" => $categories]);
  }

  public function store()
  {
    $data = Request::all();
    $data['slug'] = Slugify::slugify($data['title']);

    $validation = new Validation;
    $validated = $validation->validate([
      "title" => "required|maxLen:255",
      "content" => "required",
      "categoryId" => "required"
    ]);

    if (!$validated) {
      header('location: /admin/posts/create');
    }

    $post = new Post;
    $post = $post->create($validated);
  }

  public function edit($id)
  {
    $post = new Post;
    $foundPost = $post->findBy('id', $id);
    $category = new Category;
    $categories = $category->all();

    $this->view('admin/blog/edit', ["title" => "Editar post", "action" => "/admin/posts/", "post" => $foundPost, "categories" => $categories]);
  }

  public function update($id)
  {
    $data = Request::all();
    $data['slug'] = Slugify::slugify($data['title']);
    $post = new Post;
    $updatedPost = $post->update($id, $data);

    if ($updatedPost) {
      header('location: /admin');
    }
  }

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
