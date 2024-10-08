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
    $posts = (new Post)->all();

    $this->view('admin/blog/dashboard', [
      "title" => "Painel Administrativo",
      "posts" => $posts
    ]);
  }

  public function create()
  {
    $categories = (new Category)->all();

    $this->view('admin/blog/create', [
      "title" => "Publicar novo post",
      "action" => "/admin/posts",
      "categories" => $categories
    ]);
  }

  public function store()
  {
    $validated = (new Validation)->validate([
      "title" => "required|maxLen:255",
      "content" => "required",
      "categoryId" => "required"
    ]);

    if (!$validated) {
      return header('location: /admin/posts/create');
    }

    $validated['slug'] = Slugify::slugify($validated['title']);
    $validated['userId'] = $_SESSION['auth']->id;

    (new Post)->create($validated);
    Flash::set('post-created', 'O post foi criado com sucesso');
    return header('location: /admin');
  }

  public function edit($id)
  {
    $foundPost = (new Post)->findBy('id', $id);
    $categories = (new Category)->all();

    $this->view('admin/blog/edit', [
      "title" => "Editar post",
      "action" => "/admin/posts/",
      "post" => $foundPost,
      "categories" => $categories
    ]);
  }

  public function update($id)
  {
    $validated = (new Validation)->validate([
      "title" => "required|maxLen:255",
      "content" => "required",
      "categoryId" => "required"
    ]);

    if (!$validated) {
      header('location: /admin/posts/create');
    }

    $validated['slug'] = Slugify::slugify($validated['title']);

    (new Post)->update($id, $validated);
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