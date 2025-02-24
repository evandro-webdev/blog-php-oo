<?php

namespace app\controllers\Admin;

use app\support\Flash;
use app\support\Validation;
use app\library\Request;
use app\library\Redirect;
use app\database\models\Post;
use app\database\models\Category;
use app\services\UserService;
use app\services\PostService;
use app\controllers\Controller;
use Exception;

class AdminController extends Controller
{
  public function __construct(
    private Post $post,
    private Category $category,
    private PostService $postService,
    private UserService $userService,
    private Validation $validation
  ) {}

  public function index($userId = '')
  {
    $pagination = $this->createPagination(8);

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
    $categories = $this->category->all();

    $this->view('admin/blog/create', [
      "title" => "Publicar novo post",
      "action" => "/admin/posts",
      "categories" => $categories
    ]);
  }

  public function store()
  {
    $validated = $this->validation->validate([
      "title" => "required|maxLen:255",
      "content" => "required",
      "categoryId" => "required",
      "postImage" => 'required:file|maxSize:2|allowedTypes:image/jpeg,image/jpg',
      "featured" => "required"
    ]);

    if (!$validated) {
      Redirect::backWithData();
    }

    try {
      $this->postService->createPost($validated);
      Flash::set('post-created', 'O post foi criado com sucesso');
      Redirect::to('/admin/posts');
    } catch (Exception $e) {
      Flash::set('post-error', 'Erro ao criar post: ' . $e->getMessage());
      Redirect::backWithData();
    }
  }

  public function edit($id)
  {
    $foundPost = $this->post->findBy('id', $id);
    $categories = $this->category->all();

    $this->view('admin/blog/edit', [
      "title" => "Editar post",
      "action" => "/admin/posts/",
      "post" => $foundPost,
      "categories" => $categories
    ]);
  }

  public function update($id)
  {
    $validated = $this->validation->validate([
      "title" => "required|maxLen:255",
      "content" => "required",
      "categoryId" => "required",
      "postImage" => 'maxSize:2|allowedTypes:image/jpeg,image/jpg',
      "featured" => "required"
    ]);

    if (!$validated) {
      Redirect::backWithData();
    }

    try {
      $this->postService->updatePost($id, $validated);
      Flash::set('post-created', 'O post foi atualizado com sucesso');
      Redirect::to('/admin/posts');
    } catch (Exception $e) {
      Flash::set('post-error', 'Erro ao atualizar o post: ' . $e->getMessage());
      Redirect::backWithData();
    }
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') {
      try {
        $this->postService->deletePost($id);
        Flash::set('post-deleted', 'O post foi deletado com sucesso');
      } catch (Exception $e) {
        Flash::set('error', 'Falha ao deletar o post' . $e->getMessage());
      }

      Redirect::to('/admin/posts');
    }
  }
}
