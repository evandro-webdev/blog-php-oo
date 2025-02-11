<?php

namespace app\controllers\Admin;

use app\auth\Auth;
use app\support\Flash;
use app\support\Slugify;
use app\support\Validation;
use app\library\Request;
use app\library\Redirect;
use app\library\ImageManager;
use app\database\Pagination;
use app\database\models\Post;
use app\database\models\Category;
use app\services\UserService;
use app\services\PostService;
use app\controllers\Controller;

class AdminController extends Controller
{
  private $postService;
  private $userService;

  public function __construct()
  {
    $this->postService = new PostService;
    $this->userService = new UserService;
  }

  public function index($userId = '')
  {
    $pagination = new Pagination;
    $pagination->setItemsPerPage(8);

    $searchQuery = Request::query('search');

    $posts = $userId
      ? $this->postService->getPostsByUser($pagination, $userId)
      : $this->postService->getPosts($pagination, $searchQuery);

    $authors = $this->userService->getUsersWithPosts();

    $this->view('admin/blog/dashboard', [
      "title" => "Painel Administrativo",
      'posts' => $posts,
      "authors" => $authors,
      "pagination" => $pagination
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
      "postImage" => 'required:file|maxSize:2|allowedTypes:image/jpeg,image/jpg',
      "featured" => "required"
    ]);

    if (!$validated) {
      Redirect::backWithData();
    }

    $validated['slug'] = Slugify::slugify($validated['title']);
    $validated['userId'] = Auth::getUser()->id;

    $imageManager = new ImageManager();
    $validated['imagePath'] = $imageManager->uploadImage($validated['postImage']);
    unset($validated['postImage']);

    (new Post)->create($validated);
    Flash::set('post-created', 'O post foi criado com sucesso');
    Redirect::to('/admin');
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
      "categoryId" => "required",
      "postImage" => 'maxSize:2|allowedTypes:image/jpeg,image/jpg',
      "featured" => "required"
    ]);

    if (!$validated) {
      Redirect::backWithData();
    }

    if (!empty($validated['postImage'])) {
      $validated = $this->handleImageUpdate($id, $validated);
    }

    $validated['slug'] = Slugify::slugify($validated['title']);
    unset($validated['postImage']);

    (new Post)->update($id, $validated);
    Flash::set('post-created', 'O post foi atualizado com sucesso');
    Redirect::to('/admin');
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') {
      $imageManager = new ImageManager;
      $post = (new Post)->findBy('id', $id);

      if (!$post) {
        Flash::set('error', 'Post não encontrado');
        Redirect::to('/admin');
      }

      $imageToDelete = $post->imagePath;

      if ($imageToDelete) {
        if (!$imageManager->deleteImage($imageToDelete)) {
          Flash::set('error', 'Falha ao deletar imagem');
        }
      }

      $postModel = new Post;

      if ($postModel->delete($id)) {
        Flash::set('post-deleted', 'O post foi deletado com sucesso');
      } else {
        Flash::set('error', 'Falha ao deletar o post');
      }

      Redirect::to('/admin');
    }
  }

  private function handleImageUpdate($id, $validated)
  {
    $imageManager = new ImageManager();
    $foundPost = (new Post)->setFields('id, imagePath')->findBy('id', $id);

    if ($foundPost && $foundPost->imagePath) {
      $imageManager->deleteImage($foundPost->imagePath);
    }

    $validated['imagePath'] = $imageManager->uploadImage($validated['postImage']);
    return $validated;
  }
}
