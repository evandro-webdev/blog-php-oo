<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\database\Filters;
use app\database\models\Post;
use app\controllers\Controller;
use app\database\models\Comment;
use app\database\models\Category;
use app\library\Request;

class BlogController extends Controller
{
  // ADICIONAR NUMERO DE COMENTÁRIOS NO CARD
  public function index($slug = null)
  {
    $filter = $this->baseFilter()->orderBy('created_at', 'DESC');

    if ($slug) {
      $filter->where('categories.slug', '=', $slug);
    }

    $search = Request::query('search') ?? null;
    if ($search) {
      $filter->where('posts.title', 'LIKE', "%$search%");
    }

    $posts = (new Post)
      ->setFields("posts.title, posts.slug, posts.created_at, categories.title as category_title, users.name as author")
      ->setFilters($filter)
      ->all();

    $categories = (new Category)->all();

    $mostViewed = $this->getMostViewed();

    $this->view('blog/posts', [
      'title' => 'Postagens recentes',
      'posts' => $posts,
      'categories' => $categories,
      'mostViewed' => $mostViewed
    ]);
  }

  public function show($slug)
  {
    $filter = $this->baseFilter()->where('posts.slug', '=', $slug);

    $post = new Post;
    $foundPost = $post
      ->setFields("posts.id, posts.title, posts.slug, content, posts.created_at, categories.title as category_title, users.name as author")
      ->setFilters($filter)
      ->all();

    $post->incrementViews($foundPost[0]->id);

    $filter = $this->commentFilter($foundPost[0]->id);
    $comments = (new Comment)
      ->setFields("content, comments.created_at, name")
      ->setFilters($filter)
      ->all();

    $isAuth = Auth::isAuth();
    $this->view('blog/post', [
      'title' => 'Post',
      'post' => $foundPost[0],
      'comments' => $comments,
      'isAuth' => $isAuth
    ]);
  }

  private function baseFilter()
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->join('users', 'posts.userId', '=', 'users.id');
    return  $filter;
  }

  private function commentFilter($id)
  {
    $filter = new Filters;
    $filter->join('users', 'comments.userId', '=', 'users.id')
      ->where('postId', '=', $id)
      ->orderBy('created_at', 'DESC');

    return $filter;
  }

  private function getMostViewed($limit = 5)
  {
    $filter = new Filters;
    $filter->orderBy('views', 'DESC')
      ->limit($limit);

    return (new Post)
      ->setFields("title, slug")
      ->setFilters($filter)
      ->all();
  }
}
