<?php

namespace app\controllers\Admin;

use app\controllers\Controller;
use app\database\models\Post;
use app\database\models\Category;
use app\support\Slugify;
use app\support\Flash;
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
    $validation = new Validation;
    $validated = $validation->validate([
      "title" => "required|maxLen:255",
      "content" => "required",
      "categoryId" => "required"
    ]);

    if (!$validated) {
      header('location: /admin/posts/create');
    }

    $validated['slug'] = Slugify::slugify($validated['title']);

    $post = new Post;
    $post->create($validated);
    Flash::set('post-created', 'O post foi criado com sucesso');
    header('location: /admin');
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
    $validation = new Validation;
    $validated = $validation->validate([
      "title" => "required|maxLen:255",
      "content" => "required",
      "categoryId" => "required"
    ]);

    if (!$validated) {
      header('location: /admin/posts/create');
    }

    $validated['slug'] = Slugify::slugify($validated['title']);

    $post = new Post;
    $post->update($id, $validated);
    Flash::set('post-created', 'O post foi atualizado com sucesso');
    header('location: /admin');
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
      $post = new Post;
      $deletedPost = $post->delete($id);
      if ($deletedPost) {
        Flash::set('post-deleted', 'O post foi deletado com sucesso');
        header('location: /admin');
      }
    }
  }
}
