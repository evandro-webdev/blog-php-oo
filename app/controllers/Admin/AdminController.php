<?php

namespace app\controllers\Admin;

use Exception;
use app\support\Flash;
use app\library\Request;
use app\support\Slugify;
use app\support\Validation;
use app\database\models\Post;
use app\controllers\Controller;
use app\database\models\Category;

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
      "categoryId" => "required",
      "postImage" => 'image'
    ]);

    if (!$validated) {
      $this->redirectBackWithData('/admin/posts/create');
    }

    $validated['slug'] = Slugify::slugify($validated['title']);
    $validated['userId'] = $_SESSION['auth']->id;

    $validated['imagePath'] = $this->uploadImage($validated['postImage']);
    unset($validated['postImage']);

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
      $this->redirectBackWithData('/admin/posts/edit/' . $id);
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

  private function redirectBackWithData($url)
  {
    $_SESSION['post_data'] = Request::all();
    return header("location: $url");
  }

  private function uploadImage($image)
  {
    $imageName = uniqid() . '-' . basename($image['name']);
    $uploadDir = BASE_PATH . '/public/img/posts/';

    if (move_uploaded_file($image['tmp_name'], $uploadDir . $imageName)) {
      return '/public/img/posts/' . $imageName;
    } else {
      throw new Exception("Erro ao fazer upload.");
    }
  }
}
